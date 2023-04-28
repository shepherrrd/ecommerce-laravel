<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    //
    public function index(CartService $cart){
        return $cart->index();
    }
    public function store(CartService $cart, StoreCartRequest $request){
        return $cart->store($request);
    }
}
