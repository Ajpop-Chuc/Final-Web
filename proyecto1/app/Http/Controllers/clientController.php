<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;

class clientController extends Controller
{
    //metodo guardar
    public function create(Request $request)
    {
        try {
            $client = new client();
            $client->nombre = $request->nombre;
            $client->nit = $request->nit;
            $client->direccion = $request->direccion;
            $client->estado = 1;
            $client->save();
            return response()->json($client, 200);
        } catch (\Throwable $th) {
            return response()->json(['error BACK' => $th->getMessage()], 500);
        }
            // try {
            //     $data['nombre'] = $request['nombre'];
            //     $data['nit'] = $request['nit'];
            //     $data['direccion'] = $request['direccion'];
            //     $data['estado'] = 1;
            //     $res = client::create($data);
            //     return response()->json( $res, 200);
            // } catch (\Throwable $th) {
            //     return response()->json([ 'error' => $th->getMessage()], 500);
            // }
    }    

    //Metodo Actualizar
    public function update(Request $request,$id)
    {
        try {
            $client = client::findOrfail($id);
            $client->nombre = $request->nombre;
            $client->nit = $request->nit;
            $client->direccion = $request->direccion;
            $client->estado = $request->estado;
            $client->save();
            return response()->json([ "Update" => $client], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'errorBackend' => $th->getMessage()], 500);
        }
    }

    //Metodo Eliminar
    public function delete($id)
    {
        try {
            $client = client::findOrfail($id);
            $client->delete();
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }    
    }

    // //Metodo Mostrar
    public function getAll()
    {
        try {
            $data = client::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
