<?php

namespace App\Http\Actions\Store;

use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderImage;
use Illuminate\Support\Facades\Log;

class UpdateOrder
{
    public function handle(UpdateOrderRequest $request)
    {
        try {

            Log::info('recieved request to update a Order', [$request]);

            $order = Order::find($request->id);
            
            $order->update([
                "status"          => $request->status
            ]);

            Log::info('Order updated successfully', [$order->id]);

            return successResponse();

        } catch (\Exception $exception) {
            report($exception);
            return errorResponse($exception);
        }
    }
}
