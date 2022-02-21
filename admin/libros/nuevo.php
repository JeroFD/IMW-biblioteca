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
    $id_autor = $_REQUEST['id_autor'] ?? null;
    $id_categoria = $_REQUEST['id_categoria'] ?? null;
    $id_editorial = $_REQUEST['id_editorial'] ?? null;
    $disponible = $_REQUEST['disponible'] ?? null;

    $miInsert = $pdo->prepare('INSERT INTO libros (titulo, id_autor, id_categoria, id_editorial, disponible) VALUES (:titulo, :id_autor, :id_categoria, :id_editorial, :disponible)');
    $miInsert->execute(
        [
            'titulo' => $titulo,
            'id_autor' => $id_autor,
            'id_categoria' => $id_categoria,
            'id_editorial' => $id_editorial,
            'disponible' => $disponible
        ]
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

$stmt=$pdo->prepare("SELECT * FROM autores");
$stmt->execute();
$autores = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM categorias");
$stmt->execute();
$categorias = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM editorial");
$stmt->execute();
$editorial = $stmt->fetchAll();

try {
    echo $blade->run("admin/libros/nuevo.blade.php",
        [
            "autores" => $autores,
            "categorias" => $categorias,
            "editoriales" => $editorial
        ]);
} catch (Exception $e) {
}

?>