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

    <div class="encabezado"></div>

    <div class="container">
        <div><img src="http://localhost/laravel/aduanas/public/image/logo.png" alt="Vertix Solutions" class="logo3">
        </div>
            <div class="usuario1">
            <h1>Registrar Usuario</h1>
            
            @if(session('success'))
                <script>
                    fntUsuario(); 
                </script>
            @endif

            <form action="{{ route('registrar-usuario.store') }}" method="POST">
                @csrf
                <input type="text" name="Nombre" placeholder="Nombre" required value="{{ old('Nombre') }}">
                <div class="nombre-apellido">
                    <input type="text" name="Apellido1" placeholder="Apellido 1" required value="{{ old('Apellido1') }}">
                    <input type="text" name="Apellido2" placeholder="Apellido 2" required value="{{ old('Apellido2') }}">
                </div>
                <input type="text" name="Cedula" placeholder="Cédula" required maxlength="9" value="{{ old('Cedula') }}" class="@error('Cedula') error-input @enderror">
                @error('Cedula')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="email" name="email" placeholder="Correo Electrónico" required value="{{ old('email') }}" class="@error('email') error-input @enderror">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" name="Telefono" placeholder="Número de Teléfono" required maxlength="8" value="{{ old('Telefono') }}" class="@error('Telefono') error-input @enderror">
                @error('Telefono')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" name="Usuario" placeholder="Nombre de Usuario" required value="{{ old('Usuario') }}">
                @error('Usuario')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Contraseña" required value="">
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required value="" class="@error('password') error-input @enderror">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit">Guardar</button>
                <button type="button" onclick="fntDevolverse()">Cancelar</button>
    
            </form>
            </div>
    </div>

    <footer>
        <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
    </footer>

    </body>
</html>


