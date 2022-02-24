<!doctype html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        img {
            height: 300px;
        }
    </style>
    <title>Administración</title>
</head>
<body>

<?php if($_SESSION['usuarios']['tipo'] != "Bibliotecario")
    die('Usuario no autorizado')
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Administración</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="../../index.php">Página principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../prestamos/index.php">Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../devoluciones/index.php">Devoluciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../autores/index.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../categorias/index.php">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../editorial/index.php">Editorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../libros/index.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../usuarios/index.php">Usuarios</a>
                </li>
                <li class="nav-item">
                @if(isset($_SESSION['usuarios']))
                   Usuario: {{$_SESSION['usuarios']['nombre']}}
                    <a class='btn btn-outline-danger' href='../../logout.php'>Cerrar sesión</a>
                @else
                   <a class='btn btn-warning' href='../../login.php'>Iniciar sesión</a>
                @endif
                </li>
            </ul>
            <form class="d-flex" method="post">
                <div class="input-group">
                    <label for="buscar">
                        <input class="form-control" type="text" name="buscar"/>
                    </label>
                    <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>

        </div>
    </div>
</nav>
<div class="container">
    @yield('contenido')
</div>
</body>
</html>