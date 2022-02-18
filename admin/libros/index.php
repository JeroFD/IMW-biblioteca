<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_REQUEST["buscar"] ?? null;
    $datos = $pdo->prepare('SELECT * FROM libros WHERE titulo like CONCAT("%", :titulo, "%")');
    $datos->execute(["titulo" => $titulo]);
} else {
    $datos = $pdo->prepare('SELECT * FROM libros;');
    $datos->execute();
}

try {
    echo $blade->run("admin/libros/index.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}
?>