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
            <div class="registro-cliente">
                <h1>Registro de Cliente</h1>

                @if(session('success'))
                    <script>
                        fntExito(); 
                    </script>
                @endif

                <form action="{{ route('registrar.store') }}" method="POST">
                    @csrf
                    <input type="text" name="Nombre_Empresa" placeholder="Nombre Empresa" required value="{{ old('Nombre_Empresa') }}">
                    <input type="text" name="Cedula_Juridica" placeholder="Cédula Jurídica" required maxlength="10"value="{{ old('Cedula_Juridica') }}" class="@error('Cedula_Juridica') error-input @enderror">
                    @error('Cedula_Juridica')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <input type="text" name="Ubicacion_Empresa" placeholder="Ubicación" required value="{{ old('Ubicacion_Empresa') }}">
                    
                    <h2>Contacto de la empresa</h2>
                    
                    <input type="text" name="Nombre_Contacto" placeholder="Nombre" required value="{{ old('Nombre_Contacto') }}">
                    <div class="nombre-apellido">
                        <input type="text" name="Apellido1" placeholder="Apellido 1" required value="{{ old('Apellido1') }}">
                        <input type="text" name="Apellido2" placeholder="Apellido 2" required value="{{ old('Apellido2') }}">
                    </div>
                    <input type="text" name="Cedula_Contacto" placeholder="Cédula" required maxlength="9" value="{{ old('Cedula_Contacto') }}" class="@error('Cedula_Contacto') error-input @enderror">
                    @error('Cedula_Contacto')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <input type="email" name="Correo_Electronico" placeholder="Correo Electrónico" required value="{{ old('Correo_Electronico') }}" class="@error('Correo_Electronico') error-input @enderror">
                    @error('Correo_Electronico')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <input type="tel" name="Telefono" placeholder="Número de Teléfono" required maxlength="8" value="{{ old('Telefono') }}" class="@error('Telefono') error-input @enderror">
                    @error('Telefono')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="fntCancelar()">Cancelar</button>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
