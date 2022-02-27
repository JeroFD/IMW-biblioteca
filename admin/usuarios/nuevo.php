<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $avatar = $_REQUEST['avatar'] ?? null;
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $email = $_REQUEST['email'] ?? null;
    $password = $_REQUEST['password'] ?? null;
    $tipo = $_REQUEST['tipo'] ?? null;
    $activo = $_REQUEST['activo'] ?? null;

    //Encriptar contraseña
    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    //Subir imagen
    $avatar = $_FILES['avatar']['name'];
    $type = $_FILES['avatar']['type'];
    $size = $_FILES['avatar']['size'];

    if (!empty($avatar) && ($_FILES['avatar']['size'] <= 200000000)) {
        if (($_FILES["avatar"]["type"] == "image/gif")
            || ($_FILES["avatar"]["type"] == "image/jpeg")
            || ($_FILES["avatar"]["type"] == "image/jpg")
            || ($_FILES["avatar"]["type"] == "image/png")) {
            $directorio = '../../imagenes/usuarios/';
            move_uploaded_file($_FILES['avatar']['tmp_name'],$directorio.$avatar);
        } else {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($avatar == !NULL) echo "La imagen es demasiado grande ";
    }

    $miInsert = $pdo->prepare('INSERT INTO usuarios (avatar, nombre, apellidos, email, password, tipo, activo) VALUES (:avatar, :nombre, :apellidos, :email, :password, :tipo, :activo)');
    $miInsert->execute(
        [
            'avatar' => $avatar,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'password' => $hashPassword,
            'tipo' => $tipo,
            'activo' => $activo
        ]
    );
    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    header('Location: index.php');
}

echo $blade->run("admin/usuarios/nuevo.blade.php")

?>