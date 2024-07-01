<?php

namespace App\Http\Actions\Store;

use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GetCategories
{
    public function handle(Request $request)
    {
        try {
            Log::info('Recieved request to retrieve product categories', [$request]);

            $categories = ProductCategory::paginate();

            Log::info('Product categories retrieved successfully', [$request, $categories]);

            return successResponse(data: ProductCategoryResource::collection($categories));
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse();
        }
    }
}
