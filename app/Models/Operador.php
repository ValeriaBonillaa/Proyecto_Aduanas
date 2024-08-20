<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'Operador';

    protected $fillable = [
        'Nombre',
        'Apellido1',
        'Apellido2',
        'Cedula',
        'Correo_Electronico',
        'Telefono',
        'Empresa',
    ];
}
