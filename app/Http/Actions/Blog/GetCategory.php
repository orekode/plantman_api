<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\GetBlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Log;

class GetCategory
{
    public function handle(GetBlogCategoryRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve a single category', [$request]);

            $category = BlogCategory::where('id', $request->id)->first();

            Log::info('Category retrieved successfully', [$request]);

            return successResponse(data: new BlogCategoryResource($category));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
