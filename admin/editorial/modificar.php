<?php
include "basedatos.php";

// Leer parámetros del formulario
$id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE editorial SET nombre = :nombre WHERE id_editorial = :id_editorial');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_editorial' => $id_editorial,
            'nombre' => $nombre,
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM editorial WHERE id_editorial = :id_editorial;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id_editorial" => $id_editorial
        ]
    );
}

// Obtiene un resultado
$editorial = $miConsulta->fetch();

include "vistas/cabecera.php";
?>

<h1>Modificar editorial</h1>

<form method="post">
    <p>
        <label for="nombre">Editorial</label>
        <input id="nombre" type="text" name="nombre" value="<?= $editorial['nombre'] ?>">
    </p>
        <input type="hidden" name="id_editorial" value="<?= $id_editorial ?>">
    
        <input type="submit" value="Modificar" class="btn btn-primary">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
    </p>
</form>
</body>
</html>