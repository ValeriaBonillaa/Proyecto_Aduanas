<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertix Solutions</title>
    <link rel="stylesheet" href="{{ asset('http://localhost/laravel/aduanas/public/css/estilos.css') }}">
</head>
<body>
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
        <div class="logo">
            <img src="http://localhost/laravel/aduanas/public/image/logo.png" alt="Vertix Solutions">
        </div>

    </main>
<footer>
    <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
</footer>
</body>
</html>
