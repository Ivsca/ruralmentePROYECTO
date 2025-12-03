<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $totalProducts = Product::count();
        $totalValue = Product::sum('precio');
        
        return view('admin.products.index', compact('products', 'totalProducts', 'totalValue'));
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Producto actualizado correctamente.');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
    
    public function sold()
    {
        // Lógica para productos vendidos (necesitarías una tabla de ventas)
        $soldProducts = []; // Aquí obtendrías los productos vendidos
        $totalSold = 0; // Total de productos vendidos
        $revenue = 0; // Ingresos totales
        
        return view('admin.products.sold', compact('soldProducts', 'totalSold', 'revenue'));
    }
    
    public function export()
    {
        // Lógica para exportar productos
        return response()->streamDownload(function () {
            // Export logic
        }, 'productos_' . date('Y-m-d') . '.csv');
    }
}