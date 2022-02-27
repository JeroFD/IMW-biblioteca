<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id = $_REQUEST['id'] ?? null;
$id_usuario = $_REQUEST['id_usuario'] ?? null;
$fecha_inicio = $_REQUEST['fecha_inicio'] ?? null;
$fecha_fin = $_REQUEST['fecha_fin'] ?? null;
$motivo = $_REQUEST['motivo'] ?? null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE sanciones SET id_usuario = :id_usuario, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, motivo = :motivo WHERE id = :id');
    $stmt->execute(
        [
            'id' => $id,
            'id_usuario' => $id_usuario,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'motivo' => $motivo
        ]
    );
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM sanciones WHERE id = :id');
    $stmt->execute(["id" => $id]);
}

$datos = $stmt->fetch();

$stmt=$pdo->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();

$_SESSION["mensajes"] = "Registro modificado correctamente";

try {
    echo $blade->run("admin/sanciones/modificar.blade.php",
        [
            "datos" => $datos,
            "usuarios" => $usuarios
        ]);
} catch (Exception $e) {
}

?>