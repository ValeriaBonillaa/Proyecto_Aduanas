<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'Mercancia';

    protected $fillable = [
        'Descripcion',
        'Unidad_Medida',
        'Valor_Aduanero',
        'Ubicacion',
        'Cantidad',
        'Puerto_Origen',
        'Puerto_Destino',
        'Bulto',
    ];
}
