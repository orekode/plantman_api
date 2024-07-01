<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('/signup', 'signUp');
    Route::post('/signin', 'signIn');
    Route::post('/sendOtp', 'sendOtp');
    Route::post('/confirmOtp', 'confirmOtp');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/categories', 'getCategories');
    Route::get('/category', 'getCategory');
    Route::post('/category', 'createCategory');
    Route::put('/category', 'updateCategory');

    Route::get('/articles', 'getArticles');
    Route::get('/article', 'getArticle');
    Route::post('/article', 'createArticle');
    Route::put('/article', 'updateArticle');
});

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/',           'getProducts');
    Route::put('/',           'updateProduct');
    Route::post('/',          'createProduct');
    Route::get('/product',    'getProduct');
    
    Route::post('/category',  'createCategory');
    Route::put('/category',   'updateCategory');
    Route::get('/categories', 'getCategories');
    Route::get('/category',   'getCategory');
});

Route::prefix('orders')->controller(OrderController::class)->group(function () {
    Route::get('/',           'getOrders');
    Route::get('/order',      'getOrder');
    Route::post('/',          'createOrder');
    Route::put('/',           'updateOrder');

});

Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::controller(DiagnosticController::class)->group(function () {
        Route::post('/diagnosis', 'diagnose');
        Route::get('/diagnosis', 'getDiagnosis');
        Route::get('/diagnoses', 'getDiagnoses');
    });

});

Route::delete('/delete', [AuthController::class, 'delete']);

