<?php

namespace App\Http\Controllers;

use App\Http\Actions\Store\CreateProduct;
use App\Http\Actions\Store\GetCategories;
use App\Http\Actions\Store\CreateCategory;
use App\Http\Actions\Store\GetCategory;
use App\Http\Actions\Store\GetProduct;
use App\Http\Actions\Store\GetProducts;
use App\Http\Actions\Store\UpdateCategory;
use App\Http\Actions\Store\UpdateProduct;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\GetCategoryRequest;
use App\Http\Requests\GetProductRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function createCategory(CreateCategory $action, CreateCategoryRequest $request) {
        return $action->handle($request);
    }

    public function getCategories(GetCategories $action, Request $request) {
        return $action->handle($request);
    }

    public function getCategory(GetCategory $action, GetCategoryRequest $request) {
        return $action->handle($request);
    }

    public function updateCategory(UpdateCategory $action, UpdateCategoryRequest $request) {
        return $action->handle($request);
    }

    public function createProduct(CreateProduct $action, CreateProductRequest $request) {
        return $action->handle($request);
    }

    public function getProducts(GetProducts $action, Request $request) {
        return $action->handle($request);
    }

    public function getProduct(GetProduct $action, GetProductRequest $request) {
        return $action->handle($request);
    }

    public function updateProduct(UpdateProduct $action, UpdateProductRequest $request) {
        return $action->handle($request);
    }
}
