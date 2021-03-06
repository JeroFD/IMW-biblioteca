<!doctype html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        img {
            height: 125px;
        }
    </style>
    <title>Administración</title>
</head>
<body>

<?php
if (empty($_SESSION) || $_SESSION['usuarios']['tipo'] != "Bibliotecario") {
    echo '<a href="../../index.php">Volver a la página principal</a>';
    die('<h2 class="fw-bold">Usuario no autorizado</h2>');
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../dashboard2.php">Panel de Administración</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto m-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="../../index.php">Biblioteca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../dashboard.php">Panel de usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../prestamos/index.php">Préstamos/Devoluciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../sanciones/index.php">Sanciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../autores/index.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../categorias/index.php">Categorías</a>
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
                <li class="nav-item m-1">
            </ul>
            <form class="d-flex m-1" method="post">
                <div class="input-group">
                    <label for="buscar">
                        <input class="form-control" type="text" name="buscar"/>
                    </label>
                    <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li>
                    @if(isset($_SESSION['usuarios']))
                        <b>Usuario:</b> {{$_SESSION['usuarios']['nombre']}}
                        <a class='btn btn-outline-danger' href='../../logout.php'>Cerrar sesión</a>
                    @else
                        <a class='btn btn-warning' href='../../login.php'>Iniciar sesión</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('contenido')
</div>
<footer class="bg-light text-center mt-5 p-2">
    <p>© 2022 - Jerónimo Omar Falcón Dávila</p>
    @yield('piedepagina')
</footer>
</body>
</html>