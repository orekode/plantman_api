<?php

namespace App\Http\Actions\Store;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GetProducts
{
    public function handle(Request $request)
    {
        try {
            Log::info('Recieved request to retrieve products', [$request]);

            $products = Product::paginate();

            Log::info('Products retrieved successfully', [$request, $products]);

            return successResponse(data: ProductResource::collection($products));
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse();
        }
    }
}
