<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\GetBlogArticlesRequest;
use App\Http\Resources\BlogArticleResource;
use App\Models\BlogArticle;
use Illuminate\Support\Facades\Log;

class GetArticles
{
    public function handle(GetBlogArticlesRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve articles', [$request]);

            if (count($request->categories) > 0) {
                $articles = BlogArticle::select('id', 'title', 'desc', 'image')->whereHas('categories', function ($query) use ($request) {
                    $query->whereIn('blog_categories.id', $request->categories);
                })->inRandomOrder()->paginate();
            } else {
                $articles = BlogArticle::select('id', 'title', 'desc', 'image')->inRandomOrder()->paginate();
            }

            Log::info('Article retrieved successfully', [$request]);

            return successResponse(data: BlogArticleResource::collection($articles));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse($exception);
        }
    }
}
