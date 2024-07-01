<?php

namespace App\Http\Actions\Blog;

use App\Http\Requests\UpdateBlogArticleRequest;
use App\Models\BlogArticle;
use Illuminate\Support\Facades\Log;

class UpdateArticle
{
    public function handle(UpdateBlogArticleRequest $request)
    {
        // try {
            Log::info('recieved request to update blog article', [$request]);

            $article = BlogArticle::find($request->id);

            $path = $article->image;

            if ($request->image) {
                $path = $request->image->store('images/blogArticles');
            }

            $article->update([
                "title" => $request->title ?? $article->title,
                "desc" => $request->desc ?? $article->desc,
                "content" => $request->content ?? $article->content,
                'image' => $path
            ]);

            $article->categories()->sync($request->categories);

            Log::info('article updated successfully', [$article]);

            return successResponse();
        // } catch (\Exception $exception) {
        //     report($exception);

        //     return errorResponse();
        // }
    }
}
