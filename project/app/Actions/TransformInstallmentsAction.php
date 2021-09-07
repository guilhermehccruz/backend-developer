<?php

namespace App\Actions;

use Illuminate\Support\Carbon;

class TransformInstallmentsAction
{
	public static function handle($installments, $installmentPrice, $firstInstallment, $date)
	{
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
