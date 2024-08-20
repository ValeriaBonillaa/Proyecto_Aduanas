<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class RegistrarUsuario extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable ;

    protected $primaryKey = 'Codigo'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $table= 'Usuario';

    protected $fillable = [
        'Nombre',
        'Apellido1',
        'Apellido2',
        'Cedula',
        'email',
        'Telefono',
        'password',
        'Usuario',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    
    public function findForPassport($email)
    {
    return $this->where('email', $email)->first();
    }
}
