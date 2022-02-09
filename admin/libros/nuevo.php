<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_REQUEST['titulo'] ?? null;
    $autor = $_REQUEST['autor'] ?? null;
    $disponible = $_REQUEST['disponible'] ?? null;

    $miInsert = $pdo->prepare('INSERT INTO libros (titulo, autor, disponible) VALUES (:titulo, :autor, :disponible)');
    $miInsert->execute(
        [
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        ]
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

echo $blade->run("admin/libros/nuevo.blade.php");

?>