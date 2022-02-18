<!doctype html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>
    <style>
        img {
            height: 300px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Administración</a>
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
                <?php
                if (isset($_SESSION["login"])) {
                    echo "Hola, ".$_SESSION["login"];
                    echo "<a class='mx-2' href='../../logout.php'>Cerrar sesión</a>";
                } else {
                    echo "<a class='mr-2 ml-2 btn btn-warning' href='../../login.php'>Iniciar sesión</a>";
                }
                ?>
                </li>
            </ul>
            <form class="d-flex" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" name="buscar">
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