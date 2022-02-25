<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$codigo = $_REQUEST['codigo'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $portada = !empty($_REQUEST['portada']) ? $_REQUEST['portada'] : $_REQUEST['portada_antigua'];
    $titulo = $_REQUEST['titulo'] ?? null;
    $id_autor = $_REQUEST['id_autor'] ?? null;
    $id_categoria = $_REQUEST['id_categoria'] ?? null;
    $id_editorial = $_REQUEST['id_editorial'] ?? null;
    $disponible = $_REQUEST['disponible'] ?? null;

    if ($_FILES['portada']['size'] > 0) {
        $portada = $_FILES['portada']['name'];
        $tipo = $_FILES['portada']['type'];
        $size = $_FILES['portada']['size'];
        if (!empty($portada) && ($_FILES['portada']['size'] <= 200000000)) {
            if (($_FILES["portada"]["type"] == "image/gif")
                || ($_FILES["portada"]["type"] == "image/jpeg")
                || ($_FILES["portada"]["type"] == "image/jpg")
                || ($_FILES["portada"]["type"] == "image/png")) {
                $directorio = '../../imagenes/libros/';
                move_uploaded_file($_FILES['portada']['tmp_name'], $directorio.$portada);
            } else {
                echo "No se puede subir una imagen con ese formato ";
            }
        } else {
            if ($portada == !NULL) echo "La imagen es demasiado grande ";
        }
    }

    $stmt = $pdo->prepare('UPDATE libros SET portada = :portada, titulo = :titulo, id_autor = :id_autor, id_categoria = :id_categoria, id_editorial = :id_editorial, disponible = :disponible WHERE codigo = :codigo');
    $stmt->execute(
        [
            'codigo' => $codigo,
            'portada' => $portada,
            'titulo' => $titulo,
            'id_autor' => $id_autor,
            'id_categoria' => $id_categoria,
            'id_editorial' => $id_editorial,
            'disponible' => $disponible
        ]
    );
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM libros WHERE codigo = :codigo;');
    $stmt->execute(["codigo" => $codigo]);

}
$datos = $stmt->fetch();

$stmt=$pdo->prepare("SELECT * FROM autores");
$stmt->execute();
$autores = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM categorias");
$stmt->execute();
$categorias = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM editorial");
$stmt->execute();
$editoriales = $stmt->fetchAll();

try {
    echo $blade->run("admin/libros/modificar.blade.php",
        [
            "datos" => $datos,
            "autores" => $autores,
            "categorias" => $categorias,
            "editoriales" => $editoriales
        ]);
} catch (Exception $e) {
}

?>