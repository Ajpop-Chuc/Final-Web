<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\carroController;
use App\Http\Controllers\ropaController;
use App\Http\Controllers\pacientesController;
use App\Http\Controllers\personalMedicoController;
use App\Http\Controllers\tareasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('task')->group(function(){
    Route::get('/getAll', [taskController::class, 'showAll']);
    Route::get('/getById/{id}', [taskController::class, 'showById']);
    Route::post('/create', [taskController::class, 'store']);
    Route::put('/update/{id}', [taskController::class, 'update']);
    Route::delete('/delete/{id}', [taskController::class, 'destroy']);
});

Route::prefix('inscripcion')->group(function(){
    Route::post('/create/{type}', [InscripcionesController::class, 'store']);
    Route::post('/update/{id}', [InscripcionesController::class, 'update']);
    Route::post('/delete/{id}', [InscripcionesController::class, 'delete']);
    Route::post('/show', [InscripcionesController::class, 'showAll']);
});

Route::prefix('client')->group(function(){
    Route::post('/create', [clientController::class, 'create']);
    Route::put('/update/{id}', [clientController::class, 'update']);
    Route::delete('/delete/{id}', [clientController::class, 'delete']);
    Route::get('/getAll', [clientController::class, 'getAll']);
});

Route::prefix('producto')->group(function(){
    Route::get('/getAll', [productoController::class, 'getAll']);
    Route::post('/create', [productoController::class, 'create']);
    Route::put('/update/{id}', [productoController::class, 'update']);
    Route::delete('/delete/{id}', [productoController::class, 'delete']);
});

Route::prefix('carro')->group(function(){
    Route::get('/getAll', [carroController::class, 'getAll']);
    Route::post('/create', [carroController::class, 'create']);
    Route::put('/update/{id}', [carroController::class, 'update']);
    Route::delete('/delete/{id}', [carroController::class, 'delete']);
});

Route::prefix('ropa')->group(function(){
    Route::get('/getAll', [ropaController::class, 'getAll']);
    Route::post('/create', [ropaController::class, 'create']);
    Route::put('/update/{id}', [ropaController::class, 'update']);
    Route::delete('/delete/{id}', [ropaController::class, 'delete']);
});

Route::prefix('personal')->group(function(){
    Route::get('/getAll', [personalMedicoController::class, 'getAll']);
    Route::post('/create', [personalMedicoController::class, 'create']);
    Route::put('/update/{id}', [personalMedicoController::class, 'update']);
    Route::delete('/delete/{id}', [personalMedicoController::class, 'delete']);
});

Route::prefix('pacientes')->group(function(){
    Route::get('/getAll', [pacientesController::class, 'getAll']);
    Route::post('/create', [pacientesController::class, 'create']);
    Route::put('/update/{id}', [pacientesController::class, 'update']);
    Route::delete('/delete/{id}', [pacientesController::class, 'delete']);
});

Route::prefix('tareas')->group(function(){
    Route::get('/getAll', [tareasController::class, 'getAll']);
    Route::post('/create', [tareasController::class, 'create']);
    Route::put('/update/{id}', [tareasController::class, 'update']);
    Route::delete('/delete/{id}', [tareasController::class, 'delete']);
});