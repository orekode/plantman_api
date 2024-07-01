<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Log;

class CreateProduct
{
    public function handle(CreateProductRequest $request)
    {
        try {

            Log::info('recieved request to create a product', [$request]);

            $product = Product::create([
                "name"          => $request->name,
                "price"         => $request->price,
                "short_desc"    => $request->short_desc ?? "",
                "long_desc"     => $request->long_desc  ?? "",
            ]);

            foreach($request->images as $image) {
                ProductImage::create([
                    "product_id" => $product->id,
                    "image" => $image->store("images/products")
                ]);
            }

            $product->categories()->sync($request->categories);

            Log::info('product created successfully', [$product->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
