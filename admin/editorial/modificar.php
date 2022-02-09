<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_editorial = $_REQUEST['id_editorial'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $stmt = $pdo->prepare('UPDATE editorial SET nombre = :nombre WHERE id_editorial = :id_editorial');
    // Ejecuta UPDATE con los datos
    $stmt->execute(
        [
            'id_editorial' => $id_editorial,
            'nombre' => $nombre,
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM editorial WHERE id_editorial = :id_editorial;');
    $stmt->execute(["id_editorial" => $id_editorial]);
}

$editorial = $stmt->fetch();

try {
    echo $blade->run("admin/editorial/modificar.blade.php",
        [
            "editorial" => $editorial
        ]);
} catch (Exception $e) {
}

?>