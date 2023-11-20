<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class productoController extends Controller
{
    // //Metodo Mostrar
    public function getAll()
    {
        try {
            $productos = productos::get();
            return response()->json($productos, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //metodo guardar
    public function create(Request $request)
    {
        try {
            $producto = new productos();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->cantidad = $request->cantidad;
            $producto->precio = $request->precio;
            $producto->save();
            return response()->json($producto, 200);
        } catch (\Throwable $th) {
            return response()->json(['error BACK' => $th->getMessage()], 500);
        }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $producto = productos::findOrfail($id);
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->cantidad = $request->cantidad;
            $producto->precio = $request->precio;
            $producto->save();
            return response()->json([ "Update" => $producto], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'errorBackend' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $producto = productos::findOrfail($id);
            $producto->delete();
            return response()->json([ "deleted" => $producto ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

}
