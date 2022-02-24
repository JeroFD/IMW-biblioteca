<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $libro_id = $_REQUEST['libro_id'] ?? null;
    $usuario_id = $_REQUEST['usuario_id'] ?? null;
    $fecha_prestamo = $_REQUEST['fecha_prestamo'] ?? null;
    $fecha_devolucion = $_REQUEST['fecha_devolucion'] ?? null;

    $miInsert = $pdo->prepare('INSERT INTO prestamos (libro_id, usuario_id, fecha_prestamo, fecha_devolucion) VALUES (:libro_id, :usuario_id, :fecha_prestamo, :fecha_devolucion)');
    $miInsert->execute(
        [
            'libro_id' => $libro_id,
            'usuario_id' => $usuario_id,
            'fecha_prestamo' => $fecha_prestamo,
            'fecha_devolucion' => $fecha_devolucion,
        ]
    );
    $_SESSION["mensaje"] = "Registro añadido correctamente.";

    header('Location: index.php');
}
$stmt=$pdo->prepare("SELECT * FROM libros");
$stmt->execute();
$libros = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();

    echo $blade->run("admin/prestamos/nuevo.blade.php",
        [
            "libros" => $libros,
            "usuarios" => $usuarios
        ]);

?>