<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalMedico extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'fecha_nacimiento','genero', 'direccion', 'telefono', 'especialidad_medica'];

    // Accesor para mostrar el name con la primera letra en mayúscula
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

}