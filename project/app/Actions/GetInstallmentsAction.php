<?php

namespace App\Actions;

use Illuminate\Support\Carbon;

class GetInstallmentsAction
{
	public static function handle($installments, $amount, $date)
	{
		$installmentPrice = intval(((floatval($amount) / 100 / $installments) * 100)) / 100;

		$remaining = (floatval($amount) / 100) - ($installmentPrice * $installments);

		$firstInstallmentPrice = number_format($remaining + $installmentPrice, 2, '.', '');

		$installmentPrice = number_format($installmentPrice, 2, '.', '');

		return TransformInstallmentsAction::handle(
			$installments,
			$installmentPrice,
			$firstInstallmentPrice,
			$date
		);
	}
}
