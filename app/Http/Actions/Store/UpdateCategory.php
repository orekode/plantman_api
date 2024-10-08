<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Log;

class UpdateCategory
{
    public function handle(UpdateCategoryRequest $request)
    {
        try {

            Log::info('recieved request to update a category', [$request]);

            $category = ProductCategory::find($request->id);
            
            $category->update([
                "name" => $request->name ?? $category->name,
                "image" => $request->image ? $request->image->store("images/categories") : $category->image,
                "parent_id" => $request->parent ?? $category->parent_id,
            ]);

            Log::info('Category Updated successfully', [$category->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
