<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$codigo = $_REQUEST['codigo'] ?? null;
$titulo = $_REQUEST['titulo'] ?? null;
$autor = $_REQUEST['autor'] ?? null;
$disponible = $_REQUEST['disponible'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE libros SET titulo = :titulo, autor = :autor, disponible = :disponible WHERE codigo = :codigo');
    $stmt->execute(
        [
            'codigo' => $codigo,
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        ]
    );
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM libros WHERE codigo = :codigo;');
    $stmt->execute(["codigo" => $codigo]);
}

$libros = $stmt->fetch();

try {
    echo $blade->run("admin/libros/modificar.blade.php",
        [
            "libros" => $libros
        ]);
} catch (Exception $e) {
}

?>