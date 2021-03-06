<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$sql = 'SELECT l.*,
                                    autores.nombre AS autor,
                                    autores.apellidos AS apellido,
                                    categorias.nombre AS categoria,
                                    editorial.nombre AS editorial
                                FROM libros l
                                LEFT JOIN autores ON l.id_autor = autores.id_autor
                                LEFT JOIN categorias ON l.id_categoria = categorias.id_categoria
                                LEFT JOIN editorial ON l.id_editorial = editorial.id_editorial';

$sql2 = $sql . ' WHERE titulo like CONCAT("%", :titulo, "%")';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_REQUEST["buscar"] ?? null;
    $datos = $pdo->prepare($sql2);
    $datos->execute(["titulo" => $titulo]);
} else {
    $datos = $pdo->prepare($sql);
    $datos->execute();
}

try {
    echo $blade->run("admin/libros/index.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}
?>