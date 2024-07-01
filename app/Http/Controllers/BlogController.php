<?php

namespace App\Http\Controllers;

use App\Http\Actions\Blog\CreateArticle;
use App\Http\Actions\Blog\CreateCategory;
use App\Http\Actions\Blog\GetArticle;
use App\Http\Actions\Blog\GetArticles;
use App\Http\Actions\Blog\GetCategories;
use App\Http\Actions\Blog\GetCategory;
use App\Http\Actions\Blog\UpdateArticle;
use App\Http\Actions\Blog\UpdateCategory;
use App\Http\Requests\CreateBlogArticleRequest;
use App\Http\Requests\CreateBlogCategoryRequest;
use App\Http\Requests\GetBlogArticleRequest;
use App\Http\Requests\GetBlogArticlesRequest;
use App\Http\Requests\GetBlogCategoriesRequest;
use App\Http\Requests\GetBlogCategoryRequest;
use App\Http\Requests\UpdateBlogArticleRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;

class BlogController extends Controller
{
    public function createCategory(CreateCategory $action, CreateBlogCategoryRequest $request)
    {
        return $action->handle($request);
    }

    public function updateCategory(UpdateCategory $action, UpdateBlogCategoryRequest $request)
    {
        return $action->handle($request);
    }

    public function createArticle(CreateArticle $action, CreateBlogArticleRequest $request)
    {
        return $action->handle($request);
    }

    public function updateArticle(UpdateArticle $action, UpdateBlogArticleRequest $request)
    {
        return $action->handle($request);
    }

    public function getCategories(GetCategories $action, GetBlogCategoriesRequest $request)
    {
        return $action->handle($request);
    }

    public function getCategory(GetCategory $action, GetBlogCategoryRequest $request)
    {
        return $action->handle($request);
    }

    public function getArticles(GetArticles $action, GetBlogArticlesRequest $request)
    {
        return $action->handle($request);
    }

    public function getArticle(GetArticle $action, GetBlogArticleRequest $request)
    {
        return $action->handle($request);
    }
}
