<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Log;

class UpdateProduct
{
    public function handle(UpdateProductRequest $request)
    {
        try {

            Log::info('recieved request to update a product', [$request]);

            $product = Product::find($request->id);
            
            $product->update([
                "name"          => $request->name       ?? $product->name,
                "price"         => $request->price      ?? $product->price,
                "short_desc"    => $request->short_desc  ?? $product->short_desc,
                "long_desc"     => $request->long_desc   ?? $product->long_desc
            ]);

            if($request->removed_images)
                $product->images()->detach($request->removed_images);

            foreach(($request->images ?? []) as $image) {
                ProductImage::create([
                    "product_id" => $product->id,
                    "image"      => $image->store("images/products")
                ]);
            }

            $product->categories()->sync($request->categories);

            Log::info('product updated successfully', [$product->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
