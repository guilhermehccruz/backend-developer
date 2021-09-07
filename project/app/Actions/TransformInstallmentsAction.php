<?php

namespace App\Actions;

class TransformInstallmentsAction
{
	public static function handle($installments, $installmentPrice, $firstInstallment, $date)
	{
		$transformed = [];

		$installmentDates = GetInstallmentDateAction::handle($date, $installments);

		for ($i = 1; $i <= $installments; $i++) {
			$transformed[] = [
				'installment' => $i,
				'amount' => $i === 1 ? $firstInstallment : $installmentPrice,
				'date' => $installmentDates[$i],
			];
		}

		return $transformed;
	}
}
