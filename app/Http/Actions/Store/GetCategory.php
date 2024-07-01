<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\GetCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;

class GetCategory
{
    public function handle(GetCategoryRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve a single product category', [$request]);

            $category = ProductCategory::where('id', $request->id)->first();

            Log::info('Product category retrieved successfully', [$request]);

            return successResponse(data: new ProductCategoryResource($category));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
