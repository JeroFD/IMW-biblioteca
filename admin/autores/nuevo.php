<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_autor = $_REQUEST['id_autor'] ?? null;
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $fecha_nacimiento = $_REQUEST['fecha_nacimiento'] ?? null;
    $fecha_fallecimiento = $_REQUEST['fecha_fallecimiento'] ?? null;
    $lugar_nacimiento = $_REQUEST['lugar_nacimiento'] ?? null;
    $biografia = $_REQUEST['biografia'] ?? null;
    $foto = $_REQUEST['foto'] ?? null;

    $foto = $_FILES['foto']['name'];
    $tipo = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];

    if (!empty($foto) && ($_FILES['foto']['size'] <= 200000000)) {
        if (($_FILES["foto"]["type"] == "image/gif")
            || ($_FILES["foto"]["type"] == "image/jpeg")
            || ($_FILES["foto"]["type"] == "image/jpg")
            || ($_FILES["foto"]["type"] == "image/png")) {
            $directorio = '../../imagenes/autores/';
            move_uploaded_file($_FILES['foto']['tmp_name'],$directorio.$foto);
        } else {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($foto == !NULL) echo "La imagen es demasiado grande ";
    }

    $miInsert = $pdo->prepare('INSERT INTO autores (nombre, apellidos, fecha_nacimiento, fecha_fallecimiento, lugar_nacimiento, biografia, foto) VALUES (:nombre, :apellidos, :fecha_nacimiento, :fecha_fallecimiento, :lugar_nacimiento, :biografia, :foto)');
    $miInsert->execute(
        [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'fecha_nacimiento' => $fecha_nacimiento,
            'fecha_fallecimiento' => $fecha_fallecimiento,
            'lugar_nacimiento' => $lugar_nacimiento,
            'biografia' => $biografia,
            'foto' => $foto
        ]
    );
    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    header('Location: index.php');
}
echo $blade->run("admin/autores/nuevo.blade.php");
?>