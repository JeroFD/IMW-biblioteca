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

if (isset($_SESSION["mensajes"])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">';
    echo $_SESSION["mensajes"];
    echo '</div>';

    unset($_SESSION["mensajes"]);
}

try {
    echo $blade->run("admin/categorias/index.blade.php",
        [
            "datos" => $datos
        ]);
} catch (Exception $e) {
}

?>

