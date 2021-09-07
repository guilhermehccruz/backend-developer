<?php

namespace App\Actions;

class TransformDataAction
{
	public static function handle(array $sales)
	{
		$transformed = [];

		foreach ($sales as $sale) {
			list(
				'id' => $id,
				'date' => $date,
				'amount' => $amount,
				'installments' => $installments,
				'customer' => $customer,
				'postal_code' => $postalCode
			) = $sale;

			$date = date('Y-m-d', strtotime($date));

			$transformed[] = [
				'id' => intval($id),
				'date' => $date,
				'amount' => number_format(floatval($amount) / 100, 2, '.', ''),
				'customer' => GetCustomerDataAction::handle($customer, $postalCode),
				'installments' => GetInstallmentsAction::handle($installments, $amount, $date),
			];
		};

		return $transformed;
	}
}
