<?php
include "basedatos.php";

// Leer parámetros del formulario
$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE categorias SET nombre = :nombre WHERE id_categoria = :id_categoria');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_categoria' => $id_categoria,
            'nombre' => $nombre,
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM categorias WHERE id_categoria = :id_categoria;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id_categoria" => $id_categoria
        ]
    );
}

// Obtiene un resultado
$categoria = $miConsulta->fetch();

include "vistas/cabecera.php";
?>

<h1>Modificar categoría</h1>

<form method="post">
    <p>
        <label for="nombre">Categoria</label>
        <input id="nombre" type="text" name="nombre" value="<?= $categoria['nombre'] ?>">
    </p>
        <input type="hidden" name="id_categoria" value="<?= $id_categoria ?>">
    
        <input type="submit" value="Modificar" class="btn btn-primary">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
    </p>
</form>
</body>
</html>