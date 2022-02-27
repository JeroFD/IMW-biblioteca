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
    $portada = $_REQUEST['portada'] ?? null;
    $id_autor = $_REQUEST['id_autor'] ?? null;
    $id_categoria = $_REQUEST['id_categoria'] ?? null;
    $id_editorial = $_REQUEST['id_editorial'] ?? null;
    $disponible = $_REQUEST['disponible'] ?? null;

    $portada = $_FILES['portada']['name'];
    $tipo = $_FILES['portada']['type'];
    $size = $_FILES['portada']['size'];

    if (!empty($portada) && ($_FILES['portada']['size'] <= 200000000)) {
        if (($_FILES["portada"]["type"] == "image/gif")
            || ($_FILES["portada"]["type"] == "image/jpeg")
            || ($_FILES["portada"]["type"] == "image/jpg")
            || ($_FILES["portada"]["type"] == "image/png")) {
            $directorio = '../../imagenes/libros/';
            move_uploaded_file($_FILES['portada']['tmp_name'],$directorio.$portada);
        } else {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($portada == !NULL) echo "La imagen es demasiado grande ";
    }

    $miInsert = $pdo->prepare('INSERT INTO libros (titulo, portada, id_autor, id_categoria, id_editorial, disponible) VALUES (:titulo, :portada, :id_autor, :id_categoria, :id_editorial, :disponible)');
    $miInsert->execute(
        [
            'titulo' => $titulo,
            'portada' => $portada,
            'id_autor' => $id_autor,
            'id_categoria' => $id_categoria,
            'id_editorial' => $id_editorial,
            'disponible' => $disponible
        ]
    );
    $_SESSION["mensajes"] = "Registro añadido correctamente.";

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