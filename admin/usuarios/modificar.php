<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id = $_REQUEST['id'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;
$apellidos = $_REQUEST['apellidos'] ?? null;
$email = $_REQUEST['email'] ?? null;
$tipo = $_REQUEST['tipo'] ?? null;
$activo = $_REQUEST['activo'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email, tipo = :tipo, activo = :activo WHERE id = :id');
    $stmt->execute(
        [
            'codigo' => $codigo,
            'titulo' => $titulo,
            'id_autor' => $id_autor,
            'id_categoria' => $id_categoria,
            'id_editorial' => $id_editorial,
            'disponible' => $disponible
        ]
    );
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT *,
                                    autores.nombre AS autor,
                                    autores.apellidos AS apellido,
                                    categorias.nombre AS categoria,
                                    editorial.nombre AS editorial
                                FROM libros
                                LEFT JOIN autores ON libros.id_autor = autores.id_autor
                                LEFT JOIN categorias ON libros.id_categoria = categorias.id_categoria
                                LEFT JOIN editorial ON libros.id_editorial = editorial.id_editorial');
    $stmt->execute();
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

}

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