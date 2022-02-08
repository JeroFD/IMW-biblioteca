<?php
require "../../config.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_autor = $_REQUEST['id_autor'] ?? null;
$nombre = $_REQUEST['nombre'] ?? null;
$apellidos = $_REQUEST['apellidos'] ?? null;
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'] ?? null;
$fecha_fallecimiento = $_REQUEST['fecha_fallecimiento'] ?? null;
$lugar_nacimiento = $_REQUEST['lugar_nacimiento'] ?? null;
$biografia = $_REQUEST['biografia'] ?? null;
$foto = $_REQUEST['foto'] ?? null;

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $stmt = $pdo->prepare('UPDATE autores SET id_autor = :id_autor, nombre = :nombre, apellidos = :apellidos, fecha_nacimiento = :fecha_nacimiento, fecha_fallecimiento = :fecha_fallecimiento, lugar_nacimiento = :lugar_nacimiento, biografia = :biografia, foto = :foto  WHERE id_autor = :id_autor');
    // Ejecuta UPDATE con los datos
    $stmt->execute(
        [
            'id_autor' => $id_autor,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'fecha_nacimiento' => $fecha_nacimiento,
            'fecha_fallecimiento' => $fecha_fallecimiento,
            'lugar_nacimiento' => $lugar_nacimiento,
            'biografia' => $biografia,
            'foto' => $foto
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $datos = $pdo->prepare('SELECT * FROM autores WHERE id_autor = :id_autor');
    // Ejecuta consulta
    $datos ->execute(
        [
            "id_autor" => $id_autor
        ]
    );
}

$autores = $datos->fetch();

try {
    echo $blade->run("admin/autores/modificar.blade.php",
        [
            "autores" => $autores
        ]);
} catch (Exception $e) {
}
?>


