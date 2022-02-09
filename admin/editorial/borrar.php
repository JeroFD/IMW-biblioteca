<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_editorial = $_REQUEST['id_editorial'] ?? null;

$stmt = $pdo->prepare('DELETE FROM editorial WHERE id_editorial = :id_editorial');

$stmt->execute(["id_editorial" => $id_editorial]);

$_SESSION["mensajes"] = "Registro eliminado correctamente.";

header('Location: index.php');

?>