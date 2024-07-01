<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\GetBlogCategoriesRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Log;

class GetCategories
{
    public function handle(GetBlogCategoriesRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve blog categories', [$request]);

            $categories = BlogCategory::paginate();

            Log::info('Blog categories retrieved successfully', [$request]);

            return successResponse(data: BlogCategoryResource::collection($categories));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
