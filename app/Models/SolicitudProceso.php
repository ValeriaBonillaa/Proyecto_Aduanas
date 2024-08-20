<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudProceso extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'Proceso';

    protected $fillable = [
        'Aduana_Asociada',
        'Cliente_Codigo',
        'Operador_Codigo',
        'Usuario_Codigo',
        'Mercancia_Codigo',
        'DocumentoCliente_Codigo',
    ];
}
