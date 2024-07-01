<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\GetOrderRequest;
use App\Http\Resources\OrdersResource;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class GetOrder
{
    public function handle(GetOrderRequest $request)
    {
        try {
            Log::info('Recieved request to retrieve a single order', [$request]);

            $order = Order::find($request->id);

            Log::info('Order retrieved successfully', [$request]);

            return successResponse(data: new OrdersResource($order));
        } catch (\Exception $exception) {
            report($exception);

            return errorResponse();
        }
    }
}
