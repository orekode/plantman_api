<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CreateOrder
{
    public function handle(CreateOrderRequest $request)
    {
        try {

            Log::info('recieved request to create a Order', [$request]);

            $order = Order::create([
                "name"           => $request->name,
                "contact"        => $request->number,
                "address"        => $request->address,
                "total_quantity" => $request->quantity,
                "total_cost"     => $request->cost,
            ]);

            $total_cost = 0;
            $total_quantity = 0;

            foreach($request->cart as $item) {

                $product = Product::find($item["id"]);

                OrderProduct::create([
                    "order_id"   => $order->id,
                    "product_id" => $product->id,
                    "price"      => $product->price,
                    "quantity"   => $item["quantity"],
                ]);

                $total_cost = $total_cost + ( (double)$product->price * (double) $item["quantity"] );
                $total_quantity = $total_quantity + ( (double) $item["quantity"] );
            }

            if($total_cost != $request->cost or $total_quantity != $request->quantity) {
                $order->update([
                    "total_quantity" => $total_quantity,
                    "total_cost" => $total_cost,
                ]);
            }

            Log::info('Order created successfully', [$order->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
