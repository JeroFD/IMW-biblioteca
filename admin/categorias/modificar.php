<?php

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_categoria = $_REQUEST['id_categoria'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->prepare('UPDATE categorias SET nombre = :nombre WHERE id_categoria = :id_categoria');
    $stmt->execute(
        [
            'id_categoria' => $id_categoria,
            'nombre' => $nombre,
        ]
    );

    header('Location: index.php');
} else {
    $datos = $pdo->prepare('SELECT * FROM categorias WHERE id_categoria = :id_categoria;');
    $datos->execute(["id_categoria" => $id_categoria]);
}

$categoria = $datos->fetch();

try {
    echo $blade->run("admin/categorias/modificar.blade.php",
        [
            "categoria" => $categoria
        ]);
} catch (Exception $e) {
}
?>