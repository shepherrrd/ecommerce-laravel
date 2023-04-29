<?php
namespace App\Services;

use App\Http\Requests\StoreCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class CartService{
    use HttpResponses;
    public function index(){
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        return CartResource::collection($cart);
    }

    public function store(StoreCartRequest $request){
        $request->validated($request->all());

        $cart = Cart::create([
            'item_id' => $request->item_id,
            'user_id' => Auth::user()->id
        ]);

        return new CartResource($cart);
        
    }

    
}