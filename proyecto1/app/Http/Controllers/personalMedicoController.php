<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalMedico;

class personalMedicoController extends Controller
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
                $data['especialidad_medica'] = $request['especialidad_medica'];
                $res = PersonalMedico::create($data);
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
            $data['especialidad_medica'] = $request['especialidad_medica'];
            PersonalMedico::find($id)->update($data);
            $res = PersonalMedico::find($id);
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function destroy($id)
    {
        try {
            $res = PersonalMedico::find($id)->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

    //Metodo Mostrar
    public function showById(Request $request)
    {
        //Buscando Obj
        $personal=PersonalMedico::findOrfail($request->id); 
        if($personal){
            return ['tarea'=>$personal];
        }   
        return ['No se encontraron datos'];
    }

    public function showAll()
    {
        try {
            $data = PersonalMedico::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}