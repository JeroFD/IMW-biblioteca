<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $email = $_REQUEST['email'] ?? null;
    $password = $_REQUEST['password'] ?? null;
    $tipo = $_REQUEST['tipo'] ?? null;
    $activo = $_REQUEST['activo'] ?? null;

    $miInsert = $pdo->prepare('INSERT INTO libros (nombre, apellidos, email, password, tipo, activo) VALUES (:nombre, :apellidos, :email, :password, :tipo, :activo)');
    $miInsert->execute(
        [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'password' => $password,
            'tipo' => $tipo,
            'activo' => $activo
        ]
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

$stmt=$pdo->prepare("SELECT * FROM usuarios");
$stmt->execute();
$datos = $stmt->fetchAll();

try {
    echo $blade->run("admin/usuarios/nuevo.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}

?>