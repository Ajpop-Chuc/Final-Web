<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;
    
    protected $fillable = ['estudiante', 'carne', 'curso', 'type',];

    // // Mutador para convertir el título a mayúsculas antes de guardarlo
    // public function setNameAtribute($value)
    // {
    //     $this->attributes['name'] = ucfirst($value);
    // }

    // // Accesor para mostrar el curso con la primera letra en mayúscula
    // public function getCourseAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    // // Accesor para mostrar la descripción con la primera letra en mayúscula
    // public function getDescriptionAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    // // Relación con el modelo User (una tarea pertenece a un usuario)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    //}
}
