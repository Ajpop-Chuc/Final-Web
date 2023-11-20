<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carro;

class carroController extends Controller
{
    // //Metodo Mostrar
    public function getAll()
    {
        try {
            $carro = carro::get();
            return response()->json($carro, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //metodo guardar
    public function create(Request $request)
    {
        try {
            $carro = new carro();
            $carro->marca = $request->marca;
            $carro->tipo = $request->tipo;
            $carro->placa = $request->placa;
            $carro->estado = $request->estado;
            $carro->save();
            return response()->json($carro, 200);
        } catch (\Throwable $th) {
            return response()->json(['error BACK' => $th->getMessage()], 500);
        }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $carro = carro::findOrfail($id);
            $carro->marca = $request->marca;
            $carro->tipo = $request->tipo;
            $carro->placa = $request->placa;
            $carro->estado = $request->estado;
            $carro->save();
            return response()->json([ "Update" => $carro], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'errorBackend' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $carro = carro::findOrfail($id);
            $carro->delete();
            return response()->json([ "deleted" => $carro ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

}
