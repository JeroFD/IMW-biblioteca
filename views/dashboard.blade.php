<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Panel de usuario</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Panel de usuario</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li>
                    @if(isset($_SESSION['usuarios']))
                        <b>Usuario:</b> {{$_SESSION['usuarios']['nombre']}}
                        <a class='btn btn-outline-danger' href='../logout.php'>Cerrar sesión</a>
                    @else
                        <a class='btn btn-warning' href='../login.php'>Iniciar sesión</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="mt-3">
        <fieldset class="">
            <legend class="fw-bold">Datos del usuario:</legend>
            <b>Nombre y apellidos:</b> {{($_SESSION['usuarios']['nombre'])}} {{($_SESSION['usuarios']['apellidos'])}}<br>
            <b>Email:</b> {{($_SESSION['usuarios']['email'])}}<br>
            <b>Tipo:</b> {{($_SESSION['usuarios']['tipo'])}}
        </fieldset>
    </div>
    <div class="mt-3">
        <fieldset class="">
            <legend class="fw-bold">Mis préstamos:</legend>
            @foreach ($datos as $clave => $valor)
                <b>Libro:</b> {{$valor['libro']}}<br>
                <b>Nombre del autor:</b> {{$valor['nombreautor']}} {{$valor['apellidosautor']}}<br>
                <b>Fecha de prestamo:</b> {{$valor['fecha_prestamo']}}<br>
                <b>Fecha de devolución:</b> {{$valor['fecha_devolucion']}}
            @endforeach
        </fieldset>
    </div>
    <div class="mt-3">
        <fieldset class="">
            <legend class="fw-bold">Mis sanciones:</legend>
            @foreach ($sanciones as $clave => $valor)
                    <b>Fecha de inicio de la sanción:</b> {{$valor['fecha_inicio']}}<br>
                    <b>Fecha de fin de la sanción:</b> {{$valor['fecha_fin']}}<br>
                    <b>Motivo:</b> {{$valor['motivo']}}
                    @endforeach
        </fieldset>
    </div>
</div>
</body>
</html>

