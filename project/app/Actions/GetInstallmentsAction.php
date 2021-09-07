<?php

namespace App\Actions;

use Illuminate\Support\Carbon;

class GetInstallmentsAction
{
	public static function handle($installments, $amount, $date)
	{
		$installmentPrice = intval(((floatval($amount) / 100 / $installments) * 100)) / 100;

		$remaining = (floatval($amount) / 100) - ($installmentPrice * $installments);

		$firstInstallment = number_format($remaining + $installmentPrice, 2, '.', '');

		$installmentPrice = number_format($installmentPrice, 2, '.', '');

		$transformed = [];

		for ($i = 1; $i <= $installments; $i++) {
			$date = Carbon::createFromFormat('Y-m-d', $date);
			if ($i > 1) $date->addMonths();
			$date = $date->format('Y-m-d');

			$transformed[] = [
				'installment' => $i,
				'amount' => $i === 1 ? $firstInstallment : $installmentPrice,
				'date' => $date,
			];
		}

		return $transformed;
	}
}
