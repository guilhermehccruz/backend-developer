<?php

namespace App\Actions;

use App\Exceptions\InvalidSaleException;

class ValidateDataAction
{
	public static function handle(array $lines): bool
	{
		$pattern = '/^[0-9]{3}[0-9]{8}[0-9]{10}[0-9]{2}[a-z0-9 ]{20}[0-9]{8}$/i';

		foreach ($lines as $key => $line) {
			if (!preg_match($pattern, $line)) {
				$key += 1;
				throw new InvalidSaleException("Invalid pattern at line {$key} from file.");
			}
		}

		return true;
	}
}
