<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editorial = $_REQUEST['buscar'] ?? null;
        $datos = $pdo->prepare('SELECT * FROM editorial WHERE nombre LIKE CONCAT("%", :nombre, "%")');
        $datos->execute(['editorial' => $editorial]);
    } else {
        $datos = $pdo->prepare('SELECT * FROM editorial;');
        $datos->execute();
    }

try {
    echo $blade->run("admin/editorial/index.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}

?>

