<?php

namespace App\Actions;

use Illuminate\Support\Carbon;

class GetInstallmentDateAction
{
	public static function handle($date, $installments): array
	{
		$installmentDates = [];

		for ($i = 1; $i <= $installments; $i++) {
			$newDate = Carbon::createFromFormat('Y-m-d', $date)
				->addMonths($i);

			while ($newDate->isWeekend()) $newDate->addDays(1);

			$installmentDates[$i] = $newDate->format('Y-m-d');
		}

		return $installmentDates;
	}
}
