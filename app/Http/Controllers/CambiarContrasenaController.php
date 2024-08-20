<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CambiarContrasenaController extends Controller
{
    public function _invoke(Request $request)
    {
        return view('cambiarContrasena', [
            'token' => $request->route('token'),
            'email' => $request->query('email')
        ]);
    }

    public function actualizar(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ], [
            'password.confirmed' => '*Las contraseñas no coinciden.',
            'password.min' => '*La contraseña debe tener al menos 8 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => '*La contraseña es obligatoria.',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('login')->with('success', 'Tu contraseña ha sido cambiada con éxito.');
    }  
}
