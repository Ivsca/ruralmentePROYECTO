<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $productId)
    {
        $product = Product::find($productId->id);
        if (empty($product)) 
            return redirect('products.mis-product');
            Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            ['photo'=>$product->photo]
        );
        return redirect()->back()->with('success', 'Item agregado: ', $product->name);
    }
    public function checkout(){
        return view('products.mis-product');
    }
    public function remove(Request $product)
    {
        Cart::remove($product->id);
        // dd($product->id);
        return redirect()->back()->with('success', 'Item Eliminado!');
    }

    public function clear()
    {
        Cart::destroy();
        // dd($product->id);
        return redirect()->back()->with('success', 'Carrito vacio!');
    }

    public function increment(Request $incrementQuantity)
    {
        $item = Cart::get($incrementQuantity->id);
        $qty = $item->qty + 1;
        Cart::update($incrementQuantity->id, $qty);
    }

    public function decrement(Request $decrementQuabtity)
    {
        $item = Cart::get($decrementQuabtity->id);
        $qty = $item->qty-1;
        Cart::update($decrementQuabtity->id, $qty);
    }
}
