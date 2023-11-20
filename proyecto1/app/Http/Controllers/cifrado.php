<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ropaController extends Controller
{
    // //Metodo Mostrar
    public function cifrar()
    {
        try {
            $ropa = ropas::get();
            return response()->json($ropa, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
