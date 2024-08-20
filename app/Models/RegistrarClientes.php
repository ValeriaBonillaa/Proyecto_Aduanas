<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrarClientes extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'Cliente';

    protected $fillable = [
        'Nombre_Empresa',
        'Cedula_Juridica',
        'Ubicacion_Empresa',
        'Nombre_Contacto',
        'Apellido1',
        'Apellido2',
        'Cedula_Contacto',
        'Correo_Electronico',
        'Telefono',
    ];

}
