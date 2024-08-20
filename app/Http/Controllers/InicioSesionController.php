<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use DB;

class InicioSesionController extends Controller
{
    public function _invoke()
    {
        return view('inicioSesion');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'Nombre_Usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('Nombre_Usuario', 'password');
    
        $user = \App\Models\RegistrarUsuario::where('Usuario', $credentials['Nombre_Usuario'])->first();
    
            if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            Session::put('username', $user->Usuario);
            return redirect()->route('inicio');

            } else {
                return back()->withErrors(['Nombre_Usuario' => '*Las credenciales son incorrectas.']);
            }
    }
}
