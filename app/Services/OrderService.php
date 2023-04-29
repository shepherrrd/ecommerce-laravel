<?php
namespace App\Services;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Cart;
use App\Models\orders;
use App\Models\Products;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class OrderService{
    use HttpResponses;
    public function checkout(CreateOrderRequest $request){
        $request->validated($request->all());
        $cart = Cart::where('user_id',Auth::id())->cursor();
        
        foreach ($cart as $carts){
        $product = orders::create([
            'user_id' => $carts->user_id,
            'product' => $carts->item->item,
            'description' => $carts->item->description,
            'price' => $carts->item->price,
            'address' => $request->address
        ]);

        $stock =  Products::find($carts->item_id);

        $stock->stock -=1;
        $stock->save();
        
            $carts->delete();
        }

        return $this->success([
            'message' => 'successfull'
        ]);
        

        
    }
}