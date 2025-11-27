<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::select('id','name','title','description','price','stock','photo')->get();

        if ($request->has('debug') && $request->debug) {
            return response()->json($products);
        }

        return view('products.mis-products', compact('products'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->has('debug') && $request->debug) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }
}
