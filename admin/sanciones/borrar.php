<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id = $_REQUEST['id'] ?? null;

$stmt = $pdo->prepare('DELETE FROM sanciones WHERE id = :id');

$stmt->execute(["id" => $id]);

$_SESSION["mensajes"] = "Registro eliminado correctamente.";

header('Location: index.php');

?>