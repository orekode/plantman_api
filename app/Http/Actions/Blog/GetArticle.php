<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\GetBlogArticleRequest;
use App\Http\Resources\BlogArticleResource;
use App\Models\BlogArticle;
use Illuminate\Support\Facades\Log;

class GetArticle
{
    public function handle(GetBlogArticleRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve a single article', [$request]);

            $article = BlogArticle::where('id', $request->id)->first();

            Log::info('Article retrieved successfully', [$article]);

            return successResponse(data: new BlogArticleResource($article));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
