<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vertix Solutions</title>
        <link rel="stylesheet" href="{{ asset('http://localhost/laravel/aduanas/public/css/estilos.css') }}">
    </head>

    <body>
        
        <div class="encabezado"></div>

        <div class="container">
            <div><img src="http://localhost/laravel/aduanas/public/image/logo.png" alt="Vertix Solutions" class="logo1">
            </div>
                <div class="registro-usuario">
                    <h1>Inicio de Sesión</h1>

                    @if(session('success'))
                    <div class="success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                        <input type="text" name="Nombre_Usuario" placeholder="Nombre Usuario" required>
                        <input type="password" name="password" placeholder="Contraseña" required>
                        @error('Nombre_Usuario')
                            <div class="error">{{ $message }}</div>
                        @enderror         
                        <div class="link">
                            <a href="{{ route('restablecer-contrasena') }}">¿Olvidaste tu contraseña?</a>
                        </div>

                        <button type="submit">Ingresar</button>

                        <div class="link">
                            <a href="{{ route('registrar-usuario') }}">No tienes cuenta -Registrate</a>
                        </div>
                    </form>
                </div>
        </div>

        <footer>
            <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
        </footer>

    </body>
</html>
