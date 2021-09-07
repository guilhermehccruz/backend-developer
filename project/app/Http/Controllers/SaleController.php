<?php

namespace App\Http\Controllers;

use App\Actions\ExtractFileDataAction;
use App\Actions\SplitSalesAction;
use App\Actions\TransformDataAction;
use App\Exceptions\InvalidSaleException;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaleController extends Controller
{
	public function upload(Request $request): JsonResponse
	{
		try {
			$this->validate($request, [
				'file' => [
					'required',
					'file',
					'mimes:txt',
				],
			]);

			$lines = ExtractFileDataAction::handle($request->file);

			$split = SplitSalesAction::handle($lines);

			$transformed = TransformDataAction::handle($split);

			return response()->json(['sales' => $transformed], 200);
		} catch (InvalidSaleException $ex) {
			return response()->json([
				'message' => 'A validation error has occurred',
				'error' => $ex->getMessage(),
			], 422);
		}
	}
}
