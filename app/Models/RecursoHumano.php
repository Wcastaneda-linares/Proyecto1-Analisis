<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoHumano extends Model
{
    protected $table = 'recursos_humanos';
    protected $fillable = [
        'nombre', 
        'cargo', 
        'salario', 
        'fecha_contratacion'
    ];
    
    use HasFactory;
}
