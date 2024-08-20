<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrarClientes;
use Illuminate\Support\Facades\Auth;

class RegistrarClientesController extends Controller
{
    public function create()
    {
        $username = Auth::user()->Usuario;
        return view('registrarClientes', compact('username'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre_Empresa' => 'required|string|max:255',
            'Cedula_Juridica' => 'required|string|size:10|unique:Cliente,Cedula_Juridica',
            'Ubicacion_Empresa' => 'required|string|max:255',
            'Nombre_Contacto' => 'required|string|max:255',
            'Apellido1' => 'required|string|max:255',
            'Apellido2' => 'nullable|string|max:255',
            'Cedula_Contacto' => 'required|string|size:9|unique:Cliente,Cedula_Contacto',
            'Correo_Electronico' => 'required|email|max:255|unique:Cliente,Correo_Electronico',
            'Telefono' => 'required|string|size:8',
        ], [
            'Cedula_Juridica.size' => '*La cédula jurídica debe tener exactamente 10 caracteres.',
            'Cedula_Contacto.size' => '*La cédula debe tener exactamente 9 caracteres.',
            'Telefono.size' => '*El número de teléfono debe tener exactamente 8 caracteres.',
            'Correo_Electronico.unique' => '*El correo electrónico ya está en uso. Por favor, use uno diferente.',
            'Cedula_Contacto.unique' => '*La cédula ya esta registrada. Por favor, use una diferente.',
            'Cedula_Juridica.unique' => '*La cédula jurídica ya esta registrada. Por favor, use una diferente.',
        ]);
    
        try {
            $cliente = new RegistrarClientes();
    
            $cliente->Nombre_Empresa = $request->input('Nombre_Empresa');
            $cliente->Cedula_Juridica = $request->input('Cedula_Juridica');
            $cliente->Ubicacion_Empresa = $request->input('Ubicacion_Empresa');
            $cliente->Nombre_Contacto = $request->input('Nombre_Contacto');
            $cliente->Apellido1 = $request->input('Apellido1');
            $cliente->Apellido2 = $request->input('Apellido2');
            $cliente->Cedula_Contacto = $request->input('Cedula_Contacto');
            $cliente->Correo_Electronico = $request->input('Correo_Electronico');
            $cliente->Telefono = $request->input('Telefono');
    
            $cliente->save();
    
            session()->flash('success', 'El usuario se agregó correctamente');

            return redirect()->route('registrar');
        } catch (\Exception $e) {
            return redirect()->route('registrar')->with('error', 'No se pudo agregar el cliente. Intenta nuevamente.');
        }
    }
}    
