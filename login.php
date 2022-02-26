<?php
session_start();

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

require_once('config.php');
require "vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);

if(isset($_POST['submit'])) {
    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM usuarios WHERE email = :email ";
            $handle = $pdo->prepare($sql);
            $params = ['email'=>$email];
            $handle->execute($params);

            if($handle->rowCount() > 0) {
                $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $getRow['password'])) {
                    unset($getRow['password']);
                    $_SESSION['usuarios'] = $getRow;
                    if($_SESSION['usuarios']['activo'] == 1) {
                        if($_SESSION['usuarios']['tipo'] == "Bibliotecario") {
                            header('location:admin/dashboard2.php');
                        } else {
                            header('location:admin/dashboard.php');
                        }
                    } else {
                        $errors[] = "El usuario no está activo";
                        unset($_SESSION['usuarios']);
                    }
                } else 	{
                    $errors[] = "Correo o contraseña equivocada";
                }
            } else {
                $errors[] = "Correo o contraseña equivocada";
            }
        }
        else {
            $errors[] = "La dirección de correo electrónico no es válida";
        }
    } else {
        $errors[] = "Se requiere correo electrónico y contraseña";
    }
}
try {
    echo $blade->run("login", ["errors" => $errors]);
} catch (Exception $e) {
}

?>