<?php
require "vendor/autoload.php";
require 'config.php';

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);


$stmt = $pdo-> prepare('SELECT * FROM libros');
$stmt -> execute();
$libros = $stmt->fetchAll();


$stmt = $pdo-> prepare('SELECT * FROM autores');
$stmt -> execute();
$autores = $stmt->fetchAll();

echo $blade->run("index",
    [
        "libros" => $libros,
        "autores" => $autores
    ]);
?>