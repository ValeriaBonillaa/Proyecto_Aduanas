<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrarClientes;
use App\Models\RegistrarUsuario;
use App\Models\Operador;
use App\Models\DocumentoCliente;
use App\Models\Mercancia;
use App\Models\SolicitudProceso;
use Illuminate\Support\Facades\Auth;

class SolicitudProcesoController extends Controller
{

    public function _invoke1()
    {
        $username = Auth::user()->Usuario;
        return view('solicitudProceso1', compact('username'));
    }

    public function _invoke2()
    {
        $username = Auth::user()->Usuario;
        return view('solicitudProceso2', compact('username'));
    }

    public function _invoke3()
    {
        $username = Auth::user()->Usuario;
        return view('solicitudProceso3', compact('username'));

    }

    public function guardar1(Request $request)
    {
        $request->validate([
            'Cedula_Contacto' => 'required|size:9|exists:Cliente,Cedula_Contacto',
            'cedula_usuario' => 'required|size:9|exists:Usuario,Cedula',
            'Aduana_Asociada' => 'required|string|max:60',
        ], [
            'Cedula_Contacto.exists' => '*La cédula no está registrada',
            'cedula_usuario.exists' => '*La cédula no está registrada',
            'Cedula_Contacto.size' => '*La cédula debe tener exactamente 9 caracteres.',
            'cedula_usuario.size' => '*La cédula debe tener exactamente 9 caracteres.',
        ]);
    
        $cliente = RegistrarClientes::where('Cedula_Contacto', $request->input('Cedula_Contacto'))->first();
        $usuario = RegistrarUsuario::where('Cedula', $request->input('cedula_usuario'))->first();
    
        $request->session()->put('proceso', [
            'Aduana_Asociada' => $request->input('Aduana_Asociada'),
            'Cliente_Codigo' => $cliente->codigo,
            'Usuario_Codigo' => $usuario->Codigo,
        ]);
    
        // Verificar los datos almacenados en la sesión
        \Log::info('Datos almacenados en la sesión: ', $request->session()->get('proceso'));
    
        return redirect()->route('solicitud2');
    }
      
       
    public function guardar2(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:50',
            'Apellido1' => 'required|string|max:50',
            'Apellido2' => 'required|string|max:50',
            'Cedula' => 'required|string|size:9|unique:Operador,Cedula',
            'Correo_Electronico' => 'required|string|email|max:100|unique:Operador,Correo_Electronico',
            'Telefono' => 'required|string|size:8',
            'Empresa' => 'required|string|max:100',
            'Original_Copia' => 'required|string',
            'Archivo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'Cedula.unique' => '*La cédula ya está registrada. Por favor, use una diferente.',
            'Correo_Electronico.unique' => '*El correo electrónico ya está en uso. Por favor, use uno diferente.',
            'Telefono.size' => '*El número de teléfono debe tener exactamente 8 caracteres.',
            'Cedula.size' => '*La cédula debe tener exactamente 9 caracteres.',
            'Archivo.mimes' => '*El archivo debe ser de tipo jpg, jpeg, png o pdf.',
            'Archivo.max' => '*El archivo no debe pesar más de 2MB.',
        ]);
    
        \DB::beginTransaction();
        try {
            $operador = Operador::create($request->only([
                'Nombre', 'Apellido1', 'Apellido2', 'Cedula', 'Correo_Electronico', 'Telefono', 'Empresa'
            ]));
    
            if ($request->hasFile('Archivo')) {
                $file = $request->file('Archivo');
                $path = $file->store('documentos', 'public');
                $tipoArchivo = $file->getClientMimeType();
                $nombreArchivo = $file->getClientOriginalName();
    
                $documentoCliente = DocumentoCliente::create([
                    'Original_Copia' => $request->input('Original_Copia'),
                    'Archivo' => $path,
                    'Nombre_Archivo' => $nombreArchivo,
                    'Tipo_Archivo' => $tipoArchivo,
                ]);
            } else {
                throw new \Exception('No se subió ningún archivo.');
            }
    
            $procesoData = $request->session()->get('proceso', []);
            $procesoData['Operador_Codigo'] = $operador->Codigo;
            $procesoData['DocumentoCliente_Codigo'] = $documentoCliente->Codigo;
            $request->session()->put('proceso', $procesoData);
    
            \DB::commit();
    
            return redirect()->route('solicitud3');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error al guardar los datos: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error al guardar los datos: ' . $e->getMessage()]);
        }
    }
    
    
    public function guardar3(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:200',
            'Unidad_Medida' => 'required|string|max:50',
            'Valor_Aduanero' => 'required|numeric',
            'Ubicacion' => 'required|string|max:100',
            'Cantidad' => 'required|integer',
            'Puerto_Origen' => 'required|string|max:100',
            'Puerto_Destino' => 'required|string|max:100',
            'Bulto' => 'required|string|max:100',
        ]);
    
        \DB::beginTransaction();
        try {
            // Crear un nuevo registro de Mercancia
            $mercancia = Mercancia::create($request->only([
                'Descripcion', 'Unidad_Medida', 'Valor_Aduanero', 'Ubicacion', 'Cantidad', 'Puerto_Origen', 'Puerto_Destino', 'Bulto'
            ]));
            
            // Verifica los datos de mercancia
            \Log::info('Mercancia creada: ', $mercancia->toArray());
    
            // Recuperar los datos almacenados en la sesión
            $procesoData = $request->session()->get('proceso', []);
            \Log::info('Datos recuperados de la sesión en guardar3: ', $procesoData);
    
            // Verificar que los datos requeridos estén en la sesión
            $requiredFields = [
                'Aduana_Asociada' => 'Aduana_Asociada',
                'Cliente_Codigo' => 'Cliente_Codigo',
                'Usuario_Codigo' => 'Usuario_Codigo',
                'Operador_Codigo' => 'Operador_Codigo',
                'DocumentoCliente_Codigo' => 'DocumentoCliente_Codigo'
            ];
    
            foreach ($requiredFields as $field => $sessionKey) {
                if (!array_key_exists($sessionKey, $procesoData)) {
                    throw new \Exception("Campo requerido {$field} no encontrado en los datos de sesión.");
                }
            }
    
            // Agregar los datos de mercancía a los datos del proceso
            $procesoData['Mercancia_Codigo'] = $mercancia->Codigo;
            $request->session()->put('proceso', $procesoData);
    
            // Crear un nuevo registro en la tabla Proceso
            SolicitudProceso::create($procesoData);
    
            \DB::commit();

            session()->flash('success', 'Proceso guardado exitosamente.');

            return redirect()->route('solicitud3'); 
            
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error al guardar los datos: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error al guardar los datos: ' . $e->getMessage()]);
        }
    }
    
}