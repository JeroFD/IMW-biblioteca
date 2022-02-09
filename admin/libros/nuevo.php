<?php

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
    $disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;
    include "config.php";
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO libros (titulo, autor, disponible) VALUES (:titulo, :autor, :disponible)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        )
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";
    // Redireccionamos a Leer
    header('Location: leer.php');
}
?>
<?php include "vistas/cabecera.php";?>

<h1>Añadir libro</h1>
<form action="" method="post">
    <p>
        <label for="titulo">Titulo</label>
        <input class="form" id="titulo" type="text" name="titulo">
    </p>
    <p>
        <label for="autor">Autor</label>
        <input class="form" id="autor" type="text" name="autor">
    </p>
    <p>
    <div>¿Disponible?</div>
    <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
    </p>
    <p>
        <input class="btn btn-success btn-sm" type="submit" value="Guardar">
        <a class="btn btn-danger btn-sm" href="leer.php">Cancelar</a>
    </p>
</form>
<?php include "vistas/pie.php";?>