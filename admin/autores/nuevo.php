<?php
require "../../config.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $id_autor = $_REQUEST['id_autor'] ?? null;
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $fecha_nacimiento = $_REQUEST['fecha_nacimiento'] ?? null;
    $fecha_fallecimiento = $_REQUEST['fecha_fallecimiento'] ?? null;
    $lugar_nacimiento = $_REQUEST['lugar_nacimiento'] ?? null;
    $biografia = $_REQUEST['biografia'] ?? null;
    $foto = $_REQUEST['foto'] ?? null;

    // Prepara INSERT
    $miInsert = $pdo->prepare('INSERT INTO autores (nombre, apellidos, fecha_nacimiento, fecha_fallecimiento, lugar_nacimiento, biografia, foto) VALUES (:nombre, :apellidos, :fecha_nacimiento, :fecha_fallecimiento, :lugar_nacimiento, :biografia, :foto)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'fecha_nacimiento' => $fecha_nacimiento,
            'fecha_fallecimiento' => $fecha_fallecimiento,
            'lugar_nacimiento' => $lugar_nacimiento,
            'biografia' => $biografia,
            'foto' => $foto
        )
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";
    // Redireccionamos a Leer
    header('Location: index.php');
}
echo $blade->run("admin/autores/nuevo.blade.php");
?>