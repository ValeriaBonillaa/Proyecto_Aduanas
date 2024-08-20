<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vertix Solutions</title>
        <link rel="stylesheet" href="{{ asset('http://localhost/laravel/aduanas/public/css/estilos.css') }}">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <script src="http://localhost/laravel/aduanas/resources/js/functions.js"></script>
            <nav>
                <ul>
                <li><a href="{{ route('inicio') }}">Inicio</a></li>
                <li><a href="{{ route('registrar') }}">Agregar Cliente</a></li>
                <li><a href="{{ route('solicitud1') }}">Solicitud Proceso</a></li>
                <li><a href="#">Exportación</a></li>
                <li><a href="#">Importación</a></li>
                <li><a href="#">Facturación</a></li>
                <li><a href="#">Tránsito</a></li>
                <li class="cuenta">
                        <a href="#">Cuenta</a>
                        <div class="cuenta-content">
                            <p>Vertix Solutions</p>
                            <p>Usuario: {{ $username }}</p>
                            <form action="{{ route('cerrar-sesion') }}" method="POST">
                                @csrf
                                <button type="submit">Cerrar Sesión</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            
            <main>
                <div class="proceso">
                    <h1>Solicitud Proceso</h1>
                    <form  method="POST" action="{{ route('solicitud1.guardar') }}">
                    @csrf
                        <p>Ingrese los datos del cliente.</p>
                        <input type="text" name="Cedula_Contacto" placeholder="Cédula Cliente" required maxlength="9" class="@error('Cedula_Contacto') error-input @enderror">
                        @error('Cedula_Contacto')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <input type="text" name="Aduana_Asociada" placeholder="Aduana Asociada" required value="{{ old('Aduana_Asociada') }}">
                        <p1>Tipo de solicitud de proceso</p1>
                        <select name="select" required>
                            <option value="value1">Importación</option>
                            <option value="value2">Exportación</option>
                            <option value="value3">Tránsito</option>
                        </select>
                        
                        <p>━━━━━━━━━━━Funcionario━━━━━━━━━━━</p>
                        <input type="text" name="cedula_usuario" placeholder="Cédula Funcionario" required maxlength="9" class="@error('cedula_usuario') error-input @enderror">
                        @error('cedula_usuario')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <div class="botones">
                            <button type="submit">Siguiente</button>
                            <button type="button" onclick="fntCancelar()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </main>
            
            <footer>
                <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
            </footer>
    </body>
</html>
