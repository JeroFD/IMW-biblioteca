<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST["buscar"] ?? null;
    $datos = $pdo->prepare('SELECT * FROM prestamos WHERE id like CONCAT("%", :id, "%")');
    $datos->execute(["id" => $id]);
} else {
    $datos = $pdo->prepare('SELECT *,
                                    libros.titulo AS libro,
                                    usuarios.nombre AS nombre,
                                    usuarios.apellidos AS apellidos
                                FROM prestamos
                                LEFT JOIN libros ON prestamos.libro_id = libros.codigo
                                LEFT JOIN usuarios ON prestamos.usuario_id = usuarios.id');
    $datos->execute();
}

try {
    echo $blade->run("admin/prestamos/index.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}
?>