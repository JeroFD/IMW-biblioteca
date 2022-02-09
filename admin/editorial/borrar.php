<?php
    session_start();

    // Variables
    include "basedatos.php";

    // Obtiene codigo de la categoria a borrar
    $id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM editorial WHERE id_editorial = :id_editorial');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id_editorial" => $id_editorial
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>