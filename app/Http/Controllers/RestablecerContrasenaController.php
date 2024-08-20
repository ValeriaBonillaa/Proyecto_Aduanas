<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class RestablecerContrasenaController extends Controller
{
    public function _invoke()
    {
        return view('restablecerContrasena');
    }


    public function link(Request $request)
    {        
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
        ]);

        $response = Password::broker()->sendResetLink(
            ['email' => $request->input('email')]
        );
    
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'El enlace ya fue enviado a su correo.');
        } else {
            return back()->withErrors([
                'email' => '*Correo Electrónico invalido.',
            ]);
        }
    }

    
}



