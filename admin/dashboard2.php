<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Panel de administración</title>
</head>
<?php
if (empty($_SESSION) || $_SESSION['usuarios']['tipo'] != "Bibliotecario") {
    echo '<a href="dashboard2.php">Volver a dashboard</a>';
    die('<h2 class="fw-bold">Usuario no autorizado</h2>');
}
?>
<body>
<div class="container position-absolute top-50 start-50 translate-middle list-group text-center">
    <a class="list-group-item list-group-item-action active bg-danger border-0" aria-current="true"><h2>Administración del bibliotecario</h2></a>
    <b class="list-group-item list-group-item-action">Nombre y apellidos: <?= $_SESSION['usuarios']['nombre']?> <?= $_SESSION['usuarios']['apellidos'] ?></b>
    <a class="list-group-item list-group-item-action" href="prestamos/index.php">Préstamos</a>
    <a class="list-group-item list-group-item-action" href="sanciones/index.php">Sanciones</a>
    <a class="list-group-item list-group-item-action" href="libros/index.php">Libros</a>
    <a class="list-group-item list-group-item-action" href="categorias/index.php">Categorias</a>
    <a class="list-group-item list-group-item-action" href="editorial/index.php">Editoriales</a>
    <a class="list-group-item list-group-item-action" href="autores/index.php">Autores</a>
    <a class="list-group-item list-group-item-action" href="usuarios/index.php">Usuarios</a>
</div>
</body>
</html>