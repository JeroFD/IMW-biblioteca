<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_REQUEST['id_usuario'] ?? null;
    $fecha_inicio = $_REQUEST['fecha_inicio'] ?? null;
    $fecha_fin = $_REQUEST['fecha_fin'] ?? null;
    $motivo = $_REQUEST['motivo'] ?? null;

    $miInsert = $pdo->prepare('INSERT INTO sanciones (id_usuario, fecha_inicio, fecha_fin, motivo) VALUES (:id_usuario, :fecha_inicio, :fecha_fin, :motivo)');
    $miInsert->execute(
        [
            'id_usuario' => $id_usuario,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'motivo' => $motivo
        ]
    );
    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

$stmt=$pdo->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();

    echo $blade->run("admin/sanciones/nuevo.blade.php", ["usuarios" => $usuarios]);

?>