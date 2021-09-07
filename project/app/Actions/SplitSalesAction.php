<?php

namespace App\Actions;

class SplitSalesAction
{
	public static function handle(array $lines): array
	{
		$sales = [];

		foreach ($lines as $line) {
			$sales[] = [
				'id' => substr($line, 0, 3),
				'date' => substr($line, 3, 8),
				'amount' => substr($line, 11, 10),
				'installments' => substr($line, 21, 2),
				'customer' => substr($line, 23, 20),
				'postal_code' => substr($line, 43, 8),
			];
		}

		return $sales;
	}
}
