<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$codigo = $_REQUEST['codigo'] ?? null;

$stmt = $pdo->prepare('DELETE FROM libros WHERE codigo = :codigo');

$stmt->execute(["codigo" => $codigo]);

$_SESSION["mensajes"] = "Registro eliminado correctamente.";

header('Location: index.php');

?>