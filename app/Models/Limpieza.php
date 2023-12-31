<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limpieza extends Model
{
    protected $table = 'limpiezas';
    protected $fillable = ['nombre', 'descripcion', 'fecha_realizacion'];
    
    use HasFactory;


}
