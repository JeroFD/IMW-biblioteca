<?php
require "vendor/autoload.php";
require 'config.php';

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_REQUEST["buscar"] ?? null;
    $libros = $pdo->prepare('SELECT * FROM libros WHERE titulo like CONCAT("%", :titulo, "%")');
    $libros->execute(["titulo" => $titulo]);
} else {
    $libros = $pdo->prepare('SELECT * FROM libros;');
    $libros->execute();
}

$stmt = $pdo-> prepare('SELECT * FROM autores');
$stmt -> execute();
$autores = $stmt->fetchAll();

echo $blade->run("index",
    [
        "libros" => $libros,
        "autores" => $autores
    ]);
?>