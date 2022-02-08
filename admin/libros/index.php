<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = isset($_REQUEST["buscar"]) ? $_REQUEST["buscar"] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE titulo like CONCAT("%", :titulo, "%")');
    $miConsulta->execute(["titulo" => $titulo]);
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM libros;');
    // Ejecuta consulta
    $miConsulta->execute();
}

?>
<?php include "vistas/cabecera.php";?>

<body>
    <div class="container">
    <h1>Libros</h1>
    <?php if(isset($_SESSION["mensajes"])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">
            <?= $_SESSION["mensajes"] = "Registro añadido"; ?>
        </div>
    <?php 
        unset($_SESSION["mensajes"]);
        } 
    ?>
    <div class="d-flex justify-content-between mb-2">
    <form action="leer.php" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="buscar">
            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
        <a class="btn btn-success btn-sm" href="nuevo.php"><i class="fa fa-plus-circle" aria-hidden="true"></i>Crear</a>
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>¿Disponible?</th>
            <th colspan="2">Opciones</th>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['codigo']; ?></td>
           <td><?= $valor['titulo']; ?></td>
           <td><?= $valor['autor']; ?></td>
           <td><?= $valor['disponible'] ? 'Si' : 'No'; ?></td>
           <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
           <td><a class="btn btn-primary btn-sm" href="modificar.php?codigo=<?= $valor['codigo'] ?>"><i class="fas fa-pen"></i></a></td>
           <td><a class="btn btn-danger btn-sm" onClick="javascript:return asegurar();" href="borrar.php?codigo=<?= $valor['codigo'] ?>"><i class="fas fa-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <a href="../index.php" class="btn btn-primary">Volver</a>
    </div>
    <?php include "vistas/pie.php"?>
    <script>
    function asegurar () {
        rc = confirm("¿Seguro que desea Eliminar?");
        return rc;
        }
    </script>