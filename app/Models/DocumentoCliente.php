<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoCliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'Codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'DocumentoCliente';

    protected $fillable = [
        'Original_Copia',
        'Archivo',
        'Nombre_Archivo',
        'Tipo_Archivo',
    ];
}
