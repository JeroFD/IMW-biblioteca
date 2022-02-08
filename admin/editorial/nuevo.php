<?php
session_start();

include "basedatos.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;

    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO editorial (nombre) VALUES (:nombre)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'nombre' => $nombre
        )
    );

    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    // Redireccionamos a Leer
    header('Location: index.php');
}

?>

<?php include "vistas/cabecera.php" ?>


<h1>Añadir editorial</h1>

<form action="" method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input class="form-control" id="nombre" type="text" name="nombre">
    </p>
    <p>
        <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
        <a class="btn btn-secondary btn-sm" href="index.php">Cancelar</a>
    </p>
</form>

<?php include "vistas/pie.php" ?>