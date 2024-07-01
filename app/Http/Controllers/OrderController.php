<?php

namespace App\Http\Controllers;

use App\Http\Actions\Store\CreateOrder;
use App\Http\Actions\Store\GetOrders;
use App\Http\Actions\Store\GetOrder;
use App\Http\Actions\Store\UpdateOrder;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\GetOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(CreateOrder $action, CreateOrderRequest $request) {
        return $action->handle($request);
    }

    public function getOrders(GetOrders $action, Request $request) {
        return $action->handle($request);
    }

    public function getOrder(GetOrder $action, GetOrderRequest $request) {
        return $action->handle($request);
    }

    public function updateOrder(UpdateOrder $action, UpdateOrderRequest $request) {
        return $action->handle($request);
    }
}
