<?php

session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;

$stmt = $pdo->prepare('DELETE FROM categorias WHERE id_categoria = :id_categoria');

$stmt->execute(["id_categoria" => $id_categoria]);

$_SESSION["mensajes"] = "Registro eliminado correctamente.";

header('Location: index.php');

?>