<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;

class ExtractFileDataAction
{
	public static function handle(UploadedFile $file): array
	{
		$lines = file($file, FILE_IGNORE_NEW_LINES);

		ValidateDataAction::handle($lines);

		return $lines;
	}
}
