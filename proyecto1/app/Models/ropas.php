<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ropas extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'marca', 'precio','material', 'color'];
}
