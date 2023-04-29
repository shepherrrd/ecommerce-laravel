<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Http\Requests\CreateOrderRequest;


class OrderController extends Controller
{
    //
    public function checkout(OrderService $order,CreateOrderRequest $request){
        return $order->checkout($request);
    }
}
