<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$sql = 'SELECT p.*,
            libros.titulo AS libro,
            usuarios.nombre AS nombre,
            usuarios.apellidos AS apellidos
        FROM prestamos p
        INNER JOIN libros ON p.libro_id = libros.codigo
        INNER JOIN usuarios ON p.usuario_id = usuarios.id
        ORDER BY id';

$sql2 = $sql . ' WHERE libros.titulo like CONCAT("%", :libro, "%")';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libro = $_REQUEST["buscar"] ?? null;
    $datos = $pdo->prepare($sql2);
    $datos->execute(["libro" => $libro]);
} else {
    $datos = $pdo->prepare($sql);
    $datos->execute();
}

try {
    echo $blade->run("admin/prestamos/index.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}
?>