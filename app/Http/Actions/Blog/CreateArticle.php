<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\CreateBlogArticleRequest;
use App\Models\BlogArticle;
use Illuminate\Support\Facades\Log;

class CreateArticle
{
    public function handle(CreateBlogArticleRequest $request)
    {
        try {
            Log::info('recieved request to create blog article', [$request]);

            $path = 'article_image_'.rand(1, 4).'.png';

            if ($request->image) {
                $path = $request->image->store('images/blogArticles');
            }

            $article = BlogArticle::create([...$request->all(), 'image' => $path]);

            $article->categories()->sync($request->categories);

            Log::info('article created successfully', [$article]);

            return successResponse();
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
