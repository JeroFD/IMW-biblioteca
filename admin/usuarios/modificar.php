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
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'tipo' => $tipo,
            'activo' => $activo
        ]
    );
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
    $stmt->execute(["id" => $id]);
}

$datos = $stmt->fetch();

try {
    echo $blade->run("admin/usuarios/modificar.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}

?>