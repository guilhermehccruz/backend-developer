<?php

namespace App\Actions;

use App\Exceptions\InvalidSaleException;
use Illuminate\Http\UploadedFile;

class ExtractFileDataAction
{
	public static function handle(UploadedFile $file): array
	{
		$lines = file($file, FILE_IGNORE_NEW_LINES);

		$pattern = '/^[0-9]{3}[0-9]{8}[0-9]{10}[0-9]{2}[a-z0-9 ]{20}[0-9]{8}$/i';

		foreach ($lines as $key => $line) {
			if (!preg_match($pattern, $line)) {
				$key += 1;
				throw new InvalidSaleException("Invalid pattern at line {$key} from file.");
			}
		}

		return $lines;
	}
}
