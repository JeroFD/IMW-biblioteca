<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_REQUEST['nombre'] ?? null;
    $datos = $pdo->prepare('INSERT INTO editorial (nombre) VALUES (:nombre)');
    $datos->execute(['nombre' => $nombre]);

    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

echo $blade->run("admin/editorial/nuevo.blade.php");

?>