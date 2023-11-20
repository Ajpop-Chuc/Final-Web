<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripciones;

class InscripcionesController extends Controller
{
    //metodo guardar
    public function store(Request $request,$type)
    {
            try {
                if($type==1)
                {
                    $data['estudiante'] = $request['estudiante'];
                    $data['carne'] = $request['carne'];
                    $data['curso'] = $request['curso'];
                    $data['type'] = 'PERMANENTE';
                    $res = Inscripciones::create($data);
                    //$res = $data;
                }
                else if($type==2)
                {
                    $data['estudiante'] = $request['estudiante'];
                    $data['carne'] = $request['carne'];
                    $data['curso'] = $request['curso'];
                    $data['type'] = 'OYENTE';
                    $res = Inscripciones::create($data);
                    //$res = $data;
                }
                return response()->json( $res, 200);
            } catch (\Throwable $th) {
                return response()->json([ 'error' => $th->getMessage()], 500);
            }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $data['estudiante'] = $request['estudiante'];
            $data['carne'] = $request['carne'];
            $data['curso'] = $request['curso'];
            $data['type'] = $request['type'];
            Inscripciones::find($id)->update($data);
            $res = Inscripciones::find($id);
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $res = Inscripciones::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

    // //Metodo Mostrar
    // public function showById(Request $request)
    // {
    //     //Buscando Obj
    //     $tarea=Task::findOrfail($request->id); 
    //     if($tarea){
    //         return ['tarea'=>$tarea];
    //     }   
    //     return ['No se encontraron datos'];
    // }

    public function showAll()
    {
        try {
            $data = Inscripciones::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
