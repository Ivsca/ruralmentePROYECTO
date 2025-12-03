<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CarritoCompras;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $user_id = auth()->id(); // ID del usuario actual

        // Buscar el carrito del usuario
        $carrito = CarritoCompras::where('id_user', $user_id)->first();

        if (!$carrito) {
            // Crear un carrito nuevo
            $carrito = CarritoCompras::create([
                'id_user' => $user_id,
                'productos_ids' => json_encode([$id]), // agrega este producto al array
                'CantidadProductos' => 1,
                'seleccionado' => false,
            ]);
        } else {
            // Incrementar la cantidad
            $carrito->CantidadProductos += 1;

            // Insertar el producto dentro del array JSON
            $productos = json_decode($carrito->productos_ids, true) ?? [];
            $productos[] = $id;
            $carrito->productos_ids = json_encode($productos);

            $carrito->save();
        }

        return back()->with('success', 'Producto agregado al carrito ✔');
    }
}
