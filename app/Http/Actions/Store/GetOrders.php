<?php

namespace App\Http\Actions\Store;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GetOrders
{
    public function handle(Request $request)
    {
        try {
            Log::info('Recieved request to retrieve orders', [$request]);

            $orders = Order::paginate();

            Log::info('orders retrieved successfully', [$request, $orders]);

            return successResponse(data: OrderResource::collection($orders));
        } catch (\Exception $exception) {
            report($exception);
            return errorResponse();
        }
    }
}
