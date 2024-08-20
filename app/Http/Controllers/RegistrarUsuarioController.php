<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrarUsuario;
use Illuminate\Support\Facades\Hash;

class RegistrarUsuarioController extends Controller
{
    public function create()
    {
        return view('registrarUsuario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Apellido1' => 'required|string|max:255',
            'Apellido2' => 'required|string|max:255',
            'Cedula' => 'required|string|size:9|unique:Usuario,Cedula',
            'email' => 'required|email|max:255|unique:Usuario,email',
            'Telefono' => 'required|string|size:8',
            'password' => 'required|string|max:255|confirmed|min:8',
            'Usuario' => 'required|string|max:255|unique:Usuario,Usuario',
        ], [
            'Cedula.size' => '*La cédula debe tener exactamente 9 caracteres.',
            'Telefono.size' => '*El número de teléfono debe tener exactamente 8 caracteres.',
            'email.unique' => '*El correo electrónico ya está en uso. Por favor, use uno diferente.',
            'Cedula.unique' => '*La cédula ya esta registrada. Por favor, use una diferente.',
            'Usuario.unique' => '*El usuario ya está en uso. Por favor, use uno diferente.',
            'password.confirmed' => '*Las contraseñas no coinciden.',
            'password.min' => '*La contraseña debe tener minimo 8 dígitos.',
        ]);
    
        try {
            $usuario = new RegistrarUsuario();
    
            $usuario->Nombre = $request->input('Nombre');
            $usuario->Apellido1 = $request->input('Apellido1');
            $usuario->Apellido2 = $request->input('Apellido2');
            $usuario->Cedula = $request->input('Cedula');
            $usuario->email = $request->input('email');
            $usuario->Telefono = $request->input('Telefono');
            $usuario->password = Hash::make($request->input('password')); // Encriptar la contraseña
            $usuario->Usuario = $request->input('Usuario');
    
            $usuario->save();
    
            session()->flash('success', 'El usuario se agregó correctamente');

            return redirect()->route('registrar-usuario');
        } catch (\Exception $e) {
            
            return redirect()->route('registrar-usuario')->with('error', 'No se pudo agregar el usuario. Intenta nuevamente.');
        }
    }
}
