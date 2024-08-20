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

                @if(session('success'))
                    <script>
                        fntExito(); 
                    </script>
                @endif

                @if ($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form method="POST" action="{{ route('solicitud3.guardar') }}">
                @csrf
                    <p>Ingrese los datos de la mercancía.</p>

                    <input type="text" name="Descripcion" placeholder="Descripción" required>
                
                <div class="nombre-apellido">
                    <input type="number" name="Cantidad" placeholder="Cantidad" required>
                    <select name="Unidad_Medida" required>
                        <option value="kg">kg</option>
                        <option value="g">g</option>
                        <option value="mg">mg</option>
                    </select>
                </div>
                
                <input type="number" name="Valor_Aduanero" placeholder="Valor Estimado" required>
                <input type="text" name="Bulto" placeholder="Bulto" required>

                <div class="nombre-apellido">
                    <input type="text" name="Puerto_Origen" placeholder="Puerto de Origen" required>
                    <input type="text" name="Puerto_Destino" placeholder="Puerto de Destino" required>
                </div>

                <input type="text" name="Ubicacion" placeholder="Ubicación" required>

                <div class="botones">
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="fntCancelar()">Cancelar</button>
                </div>

                </form>
            </div>
        
        <footer>
            <p>&copy; 2024 Vertix Solutions. Todos los derechos reservados.</p>
        </footer>
    </body>
</html>
