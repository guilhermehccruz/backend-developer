<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class GetAddressDataAction
{
	public static function handle(string $postalCode)
	{
		$response = Http::get("viacep.com.br/ws/$postalCode/json/")->json();

		return [
			'street' => $response['logradouro'],
			'neighborhood' => $response['bairro'],
			'city' => $response['localidade'],
			'state' => $response['uf'],
			'postal_code' => $response['cep'],
		];
	}
}
