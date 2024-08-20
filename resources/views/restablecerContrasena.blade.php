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
            <div><img src="http://localhost/laravel/aduanas/public/image/logo.png" alt="Vertix Solutions" class="logo2">
            </div>
                <div class="registro-usuario">

                    <h1>Recuperar Contraseña</h1>

                    <form method="POST" action="{{ route('restablecer-contrasena.link') }}">
                        @csrf
                        <p>Te enviaremos un correo electrónico para restablecer tu contraseña.</p>
                        <input type="email" name="email" placeholder="Correo Electrónico" required>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <button type="submit">Restablecer</button>
                            <button type="button" onclick="fntDevolverse()">Cancelar</button>             
                    </form>
                </div>
        </div>
        <footer>
            <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
        </footer>

    </body>
</html>
