<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\CreateBlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Log;

class CreateCategory
{
    public function handle(CreateBlogCategoryRequest $request)
    {
        try {
            Log::info('recieved request to create blog category', [$request]);

            $path = 'category.png';

            if ($request->image) {
                $path = $request->image->store('/images/categories');
            }

            $article = BlogCategory::create([...$request->all(), 'image' => $path]);

            Log::info('blog category created successfully', [$article]);

            return successResponse();
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
