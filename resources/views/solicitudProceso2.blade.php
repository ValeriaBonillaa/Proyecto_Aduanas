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
        
            <div class="proceso">
                <h1>Solicitud Proceso</h1>
                <form method="POST" action="{{ route('solicitud2.guardar') }}" enctype="multipart/form-data">

                @csrf

                <p>Ingrese los datos del operador asociado.</p>
                <input type="text" name="Nombre" placeholder="Nombre" required value="{{ old('Nombre') }}">
                <div class="nombre-apellido">
                    <input type="text" name="Apellido1" placeholder="Apellido 1" required value="{{ old('Apellido1') }}">
                    <input type="text" name="Apellido2" placeholder="Apellido 2" required value="{{ old('Apellido2') }}">
                </div>
                <input type="text" name="Cedula" placeholder="Cédula" required maxlength="9" value="{{ old('Cedula') }}"class="@error('Cedula') error-input @enderror">
                @error('Cedula')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" name="Empresa" placeholder="Empresa" required value="{{ old('Empresa') }}">
                <input type="email" name="Correo_Electronico" placeholder="Correo Electrónico" value="{{ old('Correo_Electronico') }}" required class="@error('Correo_Electronico') error-input @enderror">
                @error('Correo_Electronico')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" name="Telefono" placeholder="Número de Teléfono" required maxlength="8" value="{{ old('Telefono') }}" class="@error('Telefono') error-input @enderror">
                @error('Telefono')
                    <div class="error">{{ $message }}</div>
                @enderror
                <p>━━━━━━━━━━━━━━━━━━━━━━━━━━━</p>

                <p>Ingrese los datos aportados por el cliente.</p>

                <div class="proceso-checkbox">
                    <p><input type="radio" name="Original_Copia" value="Original" required> Original</p>
                    <p><input type="radio" name="Original_Copia" value="Copia" required> Copia</p>
                </div>

                <div class="archivo">
                    <input type="file" id="Archivo" name="Archivo" accept=".jpg, .jpeg, .png, .pdf" required>
                </div>

                    <div class="botones">
                        <button type="submit">Siguiente</button>
                        <button type="button" onclick="fntCancelar()">Cancelar</button>
                    </div>

                </form>
            </div>
        
        <footer>
            <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
