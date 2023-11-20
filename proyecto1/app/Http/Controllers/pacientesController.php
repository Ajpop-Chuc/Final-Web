<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;

class pacientesController extends Controller
{
    //metodo guardar
    public function store(Request $request)
    {
            try {
                $data['nombre'] = $request['nombre'];
                $data['fecha_nacimiento'] = $request['fecha_nacimiento'];
                $data['genero'] = $request['genero'];
                $data['direccion'] = $request['direccion'];
                $data['telefono'] = $request['telefono'];
                $data['informacion_contacto'] = $request['informacion_contacto'];
                $res = Pacientes::create($data);
                return response()->json( $res, 200);
            } catch (\Throwable $th) {
                return response()->json([ 'error' => $th->getMessage()], 500);
            }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $data['nombre'] = $request['nombre'];
            $data['fecha_nacimiento'] = $request['fecha_nacimiento'];
            $data['genero'] = $request['genero'];
            $data['direccion'] = $request['direccion'];
            $data['telefono'] = $request['telefono'];
            $data['informacion_contacto'] = $request['informacion_contacto'];
            Pacientes::find($id)->update($data);
            $res = Pacientes::find($id);
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function destroy($id)
    {
        try {
            $res = Pacientes::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

    //Metodo Mostrar
    public function showById(Request $request)
    {
        //Buscando Obj
        $pacientes=Pacientes::findOrfail($request->id); 
        if($pacientes){
            return ['tarea'=>$pacientes];
        }   
        return ['No se encontraron datos'];
    }

    public function showAll()
    {
        try {
            $data = Pacientes::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}