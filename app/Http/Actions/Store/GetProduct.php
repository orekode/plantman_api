<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\GetProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class GetProduct
{
    public function handle(GetProductRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve a single product', [$request]);

            $Product = Product::where('id', $request->id)->first();

            Log::info('Product Product retrieved successfully', [$request]);

            return successResponse(data: new ProductResource($Product));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
