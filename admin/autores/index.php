<?php
session_start();
require "../../config.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_REQUEST["buscar"] ?? null;
    $stmt = $pdo->prepare('SELECT * FROM autores WHERE nombre like CONCAT("%", :nombre, "%")');
    $stmt->execute(["nombre" => $nombre]);
} else {
    $datos = $pdo->prepare('SELECT * FROM autores');
    $datos->execute();
}
try {
    echo $blade->run("admin/autores/index.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}
?>