<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_REQUEST['buscar'] ?? null;
    $datos = $pdo->prepare('SELECT * FROM categorias WHERE nombre LIKE CONCAT("%", :nombre, "%")');
    $datos->execute(['nombre' => $nombre]);
} else {
    $datos = $pdo->prepare('SELECT * FROM categorias;');
    $datos->execute();
    }

try {
    echo $blade->run("admin/categorias/index.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}

?>

