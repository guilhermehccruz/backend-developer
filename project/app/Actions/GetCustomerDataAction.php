<?php

namespace App\Actions;

class GetCustomerDataAction
{
	public static function handle(string $customer, string $postalCode)
	{
		return [
			'name' => trim($customer),
			'address' => GetAddressDataAction::handle($postalCode),
		];
	}
}
