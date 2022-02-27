<?php
session_start();

require "vendor/autoload.php";
require 'config.php';

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);


$sql = 'SELECT l.*,
            autores.nombre AS autor,
            autores.apellidos AS apellido
        FROM libros l
        LEFT JOIN autores ON l.id_autor = autores.id_autor';

$sql2 = $sql . ' WHERE titulo like CONCAT("%", :titulo, "%")';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_REQUEST["buscar"] ?? null;
    $libros = $pdo->prepare($sql2);
    $libros->execute(["titulo" => $titulo]);
} else {
    $libros = $pdo->prepare($sql);
    $libros->execute();
}

echo $blade->run("index", ["libros" => $libros,]);
?>