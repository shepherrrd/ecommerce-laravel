<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return  ProductsResource::collection(Products::paginate(15));
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = Products::find($id);
            if($products){
        return new ProductsResource($products);
            }else{
            return $this->error([],"No Product Found",404);

            }
        
    }

    
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $products = Products::find($id);

        $products->update($request->all());
        $products->save();

        return new ProductsResource($products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $products = Products::find($id);
        if($products){
            $products->delete();
            return $this->success([]);
        }else{
            return $this->error([],"No Product Found",404);
        }
    }

    public function search(Request $request){

        $request->validate([
            "search" => "required|max:255"
        ]);
        $queri = $request->search;

        $product = Products::where("item","like","%".$queri."%")->get();
      return ProductsResource::collection($product);
    }

}
