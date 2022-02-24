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
    if(isset($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        //$activo = trim($_POST['activo']);
        //$tipo = trim($_POST['tipo']);
        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = 'SELECT * FROM usuarios WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);

            if($stmt->rowCount() == 0) {
                $sql = "INSERT INTO usuarios (nombre, apellidos, email, `password`, fecha_creacion , fecha_modificacion, tipo, activo) VALUES (:fname,:lname,:email,:pass,:created_at,:updated_at, :tipo, :activo)";
                try {
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fname' => $nombre,
                        ':lname' => $apellidos,
                        ':email' => $email,
                        ':pass' => $hashPassword,
                        ':created_at' => $date,
                        ':updated_at' => $date,
                        ':tipo' => 'Alumnado',
                        ':activo' => 1
                    ];

                    $handle->execute($params);
                    $success = 'El usuario ha sido creado con éxito, si usted es un administrador de la biblioteca comuníquese con el bibliotecario principal para cambiarle el tipo de usuario';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                $valFirstName = $nombre;
                $valLastName = $apellidos;
                $valEmail = '';
                $valPassword = $password;

                $errors[] = 'Cuenta de correo ya registrada';
            }
        } else {
            $errors[] = "La dirección de correo electrónico no es válida";}
    } else {
        if(empty($_POST['nombre'])){
            $errors[] = 'Se requiere el primer nombre';
        } else {
            $valFirstName = $_POST['nombre'];
        }
        if(empty($_POST['apellidos'])){
            $errors[] = 'Se requiere apellido';
        } else {
            $valLastName = $_POST['apellidos'];
        }
        if(empty($_POST['email'])){
            $errors[] = 'Correo electrónico es requerido';
        } else {
            $valEmail = $_POST['email'];
        }
        if(empty($_POST['password'])) {
            $errors[] = 'Se requiere contraseña';
        } else {
            $valPassword = $_POST['password'];
        }
    }
}
try {
    echo $blade->run("register",
        [
            "errors" => $errors,
            "success" => $success
        ]
    );
} catch (Exception $e) {
}
?>