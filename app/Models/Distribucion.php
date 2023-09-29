<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    protected $table = 'distribuciones';

    protected $fillable = [
        'nombre',
        'cantidad',
        'fecha_entrega',
        'proveedor',
        'destino',
        'tamano_cisterna',
    ];
    
    use HasFactory;
}
