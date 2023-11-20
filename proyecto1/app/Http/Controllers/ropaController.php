<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ropas;

class ropaController extends Controller
{
    // //Metodo Mostrar
    public function getAll()
    {
        try {
            $ropa = ropas::get();
            return response()->json($ropa, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //metodo guardar
    public function create(Request $request)
    {
        try {
            $ropa = new ropas();
            $ropa->tipo = $request->tipo;
            $ropa->marca = $request->marca;
            $ropa->precio = $request->precio;
            $ropa->material = $request->material;
            $ropa->color = $request->color;
            $ropa->save();
            return response()->json($ropa, 200);
        } catch (\Throwable $th) {
            return response()->json(['error BACK' => $th->getMessage()], 500);
        }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $ropa = ropas::findOrfail($id);
            $ropa->tipo = $request->tipo;
            $ropa->marca = $request->marca;
            $ropa->precio = $request->precio;
            $ropa->material = $request->material;
            $ropa->color = $request->color;
            $ropa->save();
            return response()->json([ "Update" => $ropa], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'errorBackend' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $ropa = ropas::findOrfail($id);
            $ropa->delete();
            return response()->json([ "deleted" => $ropa ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

}
