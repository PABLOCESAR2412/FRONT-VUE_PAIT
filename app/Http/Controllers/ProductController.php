<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return response()->json(
            [
                'products' => $products,
                'message' => 'Product',
                'code' => 200
            ]
        );
    }

    public function getProduct($id)
    {
        try {
            $product = Product::findOrFail($id);  // Busca el producto o lanza una excepción si no se encuentra
            return response()->json([
                'product' => $product,  // Usa singular para la clave del producto
                'message' => 'Producto encontrado',  // Mensaje más claro
                'code' => 200
            ]);
            } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'code' => 404
            ], 404);  // Devuelve un error 404 si el producto no existe
        }
    }

    public function saveProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();
        return response()->json(
            [
                'message' => 'Producto creado correctamente',
                'code' => 200
            ]
        );
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(
                [
                    'message' => 'Producto eliminado correctamente',
                    'code' => 200
                ]
            );
        } else {
            return response()->json(
                [
                    'message' => 'Producto con el id: ' . $id . ' no encontrado',
                    'code' => 404
                ]
            );
        }
    }
}

