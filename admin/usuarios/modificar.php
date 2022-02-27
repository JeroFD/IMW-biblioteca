<?php
session_start();

require "../../config.php";
require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

$id = $_REQUEST['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $avatar = !empty($_REQUEST['avatar']) ? $_REQUEST['avatar'] : $_REQUEST['avatar_anterior'];
    $nombre = $_REQUEST['nombre'] ?? null;
    $apellidos = $_REQUEST['apellidos'] ?? null;
    $email = $_REQUEST['email'] ?? null;
    $password = $_REQUEST['password'] ?? null;
    $tipo = $_REQUEST['tipo'] ?? null;
    $activo = $_REQUEST['activo'] ?? null;

    $options = array("cost" => 4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    if($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
        $type = $_FILES['avatar']['type'];
        $size = $_FILES['avatar']['size'];

        if(!empty($avatar) && ($_FILES['avatar']['size'] <= 200000000)) {
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
            if ($avatar == !NULL) echo "La imagen es demasiado grande ";
        }
    }

    $stmt = $pdo->prepare('UPDATE usuarios SET avatar = :avatar, nombre = :nombre, apellidos = :apellidos, email = :email, password = :password, tipo = :tipo, activo = :activo WHERE id = :id');
    $stmt->execute(
        [
            'id' => $id,
            'avatar' => $avatar,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'password' => $hashPassword,
            'tipo' => $tipo,
            'activo' => $activo
        ]
    );
    $_SESSION["mensajes"] = "Registro modificado correctamente";

    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
    $stmt->execute(["id" => $id]);
}

$datos = $stmt->fetch();

try {
    echo $blade->run("admin/usuarios/modificar.blade.php", ["datos" => $datos]);
} catch (Exception $e) {
}

?>