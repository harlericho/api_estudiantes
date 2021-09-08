<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'dni',
        'nombres', 
        'correo', 
        'telefono', 
        'direccion'
    ];
    protected $hidden=[
        'created_at', 'updated_at'
    ];
}
