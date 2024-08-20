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
            <div>
                <img src="http://localhost/laravel/aduanas/public/image/logo.png" alt="Vertix Solutions" class="logo2">
            </div>
            <div class="registro-usuario">
                
                <h1>Cambiar Contraseña</h1>
                <p>Ingrese su nueva contraseña.</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <input type="password" name="password" placeholder="Nueva Contraseña" required>           
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
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
