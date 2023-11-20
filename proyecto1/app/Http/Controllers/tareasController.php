<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tareas;

class tareasController extends Controller
{
    // //Metodo Mostrar
    public function getAll()
    {
        try {
            $tareas = tareas::get();
            return response()->json($tareas, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //metodo guardar
    public function create(Request $request)
    {
        try {
            $tareas = new tareas();
            $tareas->nombre = $request->nombre;
            $tareas->descripcion = $request->descripcion;
            $tareas->estado = $request->estado;
            $tareas->save();
            return response()->json($tareas, 200);
        } catch (\Throwable $th) {
            return response()->json(['error BACK' => $th->getMessage()], 500);
        }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $tareas = tareas::findOrfail($id);
            $tareas->nombre = $request->nombre;
            $tareas->descripcion = $request->descripcion;
            $tareas->estado = $request->estado;
            $tareas->save();
            return response()->json([ "Update" => $tareas], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'errorBackend' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $tareas = tareas::findOrfail($id);
            $tareas->delete();
            return response()->json([ "deleted" => $tareas ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

}
