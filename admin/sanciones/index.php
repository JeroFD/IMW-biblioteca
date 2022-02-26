<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$sql = 'SELECT s.*,
            usuarios.nombre AS nombre,
            usuarios.apellidos AS apellidos
        FROM sanciones s
        INNER JOIN usuarios ON s.id_usuario = usuarios.id';

$sql2 = $sql . ' WHERE usuarios.nombre like CONCAT("%", :nombre, "%")';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_REQUEST["buscar"] ?? null;
    $datos = $pdo->prepare($sql2);
    $datos->execute(["nombre" => $nombre]);
} else {
    $datos = $pdo->prepare($sql);
    $datos->execute();
}

try {
    echo $blade->run("admin/sanciones/index.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}
?>