<?php
require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_autor = isset($_REQUEST['id_autor']) ? $_REQUEST['id_autor'] : null;

$stmt = $pdo->prepare('DELETE FROM autores WHERE id_autor = :id_autor');

$stmt->execute(["id_autor" => $id_autor]);

header('Location: index.php');
?>