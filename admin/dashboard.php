<?php
session_start();

require "../config.php";
require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$sql = 'SELECT p.*,
            libros.titulo AS libro,
            autores.nombre AS nombreautor,
            autores.apellidos AS apellidosautor,
            usuarios.nombre AS nombre,
            usuarios.apellidos AS apellidos
        FROM prestamos p 
        INNER JOIN libros ON p.libro_id = libros.codigo
        INNER JOIN usuarios ON p.usuario_id = usuarios.id
        INNER JOIN autores ON libros.id_autor = autores.id_autor
        WHERE usuario_id = :usuario_id';

$datos = $pdo->prepare($sql);
$datos->execute(['usuario_id' => $_SESSION['usuarios']['id']]);

$sql2 = 'SELECT * FROM sanciones WHERE id_usuario = :id_usuario';
$sanciones = $pdo->prepare($sql2);
$sanciones->execute(["id_usuario" => $_SESSION['usuarios']['id']]);

try {
    echo $blade->run("dashboard",
        [
            "datos" => $datos,
            "sanciones" => $sanciones
        ]
    );
} catch (Exception $e) {
}
?>