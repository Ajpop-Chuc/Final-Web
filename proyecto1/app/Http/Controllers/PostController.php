<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //metodo guardar
    public function store(Request $request)
    {
        //intanciacion del modelo
        $Post1=new Post();
        $Post1->title = $request->title;
        $Post1->decription = $request->decription;
        $Post1->completed = $request->completed;        
    }

    //Metodo Actualizar
    public function update(Request $request)
    {
        //Recueprando Obj a Modificar
        $Post1=Post::findOrfail($request->id);
        $Post1->title = $request->title;
        $Post1->decription = $request->decription;
        $Post1->completed = $request->completed;        
    }

    //Metodo Eliminar
    public function destroy(Request $request)
    {
        //Buscando Obj a eliminar
        $Post1=Post::findOrfail($request->id); 
        $Post1->delete();     
    }

    //Metodo Mostrar
    public function show(Request $request)
    {
        //Buscando Obj
        $Post1=Post::findOrfail($request->id); 
        if($Post1){
            return ['Post1'=>$Post1];
        }   
        return ['No se encontraron datos'];
    }

    /*public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Crear una nueva publicacion
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => false,
            'user_id' => auth()->user()->id, // Asignar al usuario autenticado
        ]);

        // Redireccionar o responder con JSON
        return redirect()->route('posts.index')->with('success', 'Publicacion creada exitosamente.');
    }

    public function update(Request $request, Post $post)
    {
        // Validación de datos
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        // Actualizar la publicacion
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Redireccionar o responder con JSON
        return redirect()->route('posts.index')->with('success', 'Publicacion actualizada exitosamente.');
    }

    // Otros métodos y personalizaciones...*/
}
