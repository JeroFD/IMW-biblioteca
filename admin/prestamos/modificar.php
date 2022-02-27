<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id = $_REQUEST['id'] ?? null;
$libro_id = $_REQUEST['libro_id'] ?? null;
$usuario_id = $_REQUEST['usuario_id'] ?? null;
$fecha_prestamo = $_REQUEST['fecha_prestamo'] ?? null;
$fecha_devolucion = $_REQUEST['fecha_devolucion'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE prestamos SET libro_id = :libro_id, usuario_id = :usuario_id, fecha_prestamo = :fecha_prestamo, fecha_devolucion = :fecha_devolucion WHERE id = :id');
    $stmt->execute(
        [
            'id' => $id,
            'libro_id' => $libro_id,
            'usuario_id' => $usuario_id,
            'fecha_prestamo' => $fecha_prestamo,
            'fecha_devolucion' => $fecha_devolucion
        ]
    );

    $_SESSION["mensajes"] = "Registro modificado correctamente";

    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM prestamos WHERE id = :id');
    $stmt->execute(["id" => $id]);
}

$datos = $stmt->fetch();

$stmt=$pdo->prepare("SELECT * FROM libros");
$stmt->execute();
$libros = $stmt->fetchAll();

$stmt=$pdo->prepare("SELECT * FROM usuarios");
$stmt->execute();
$usuarios = $stmt->fetchAll();



try {
    echo $blade->run("admin/prestamos/modificar.blade.php",
        [
            "datos" => $datos,
            "libros" => $libros,
            "usuarios" => $usuarios
        ]);
} catch (Exception $e) {
}

?>