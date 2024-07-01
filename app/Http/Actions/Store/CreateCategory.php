<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;

class CreateCategory
{
    public function handle(CreateCategoryRequest $request)
    {
        try {

            Log::info('recieved request to create a category', [$request]);

            $category = ProductCategory::create([
                "name" => $request->name,
                "image" => $request->image ? $request->image->store("images/categories") : "images/categories/category.png",
                "parent_id" => $request->parent,

            ]);

            Log::info('Category created successfully', [$category->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
