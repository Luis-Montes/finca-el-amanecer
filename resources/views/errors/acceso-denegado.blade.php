<!DOCTYPE html>
<html>
<head>
    <title>Acceso Denegado</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body class="text-center" style="padding-top: 100px;">
    <h1 class="text-danger">⛔ Acceso denegado</h1>
    <p>No tienes permisos para acceder a esta sección.</p>
                            <a
                            href="#"
                            class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            Cerrar sesión
                        </a>
                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none"
                        >
                            @csrf
                        </form>
</body>
</html>
