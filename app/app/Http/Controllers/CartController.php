<?php

namespace App\Http\Controllers;

use App\Cart as CartModel;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function productToCart($product_id) {

        $product = new Product;
        $product = Product::findOrFail($product_id);

        Cart::add([
            [
                'id' => $product->id,
                'name' => $product->title,
                'qty' => '1',
                'price' => $product->price,
                'weight' => '1',
                'options' => ['path'=>$product->image_path, 'size' =>'large','medium','small']
                ]
            ]);
        
        return redirect('/cart');
    }
    public function reset() {
        Cart::destroy();
        return redirect('/cart');
    }

    public function remove($rowId) {
        Cart::remove($rowId);
        return redirect('/cart');
    }
    public function ToCart() {

        $carts = Cart::content();
        return view('cart_customer',compact('carts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartModel $cart)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
