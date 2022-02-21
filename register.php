<?php
session_start();
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
        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = 'SELECT * FROM usuarios WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);

            if($stmt->rowCount() == 0) {
                $sql = "INSERT INTO usuarios (nombre, apellidos, email, `password`, created_at,updated_at) VALUES (:fname,:lname,:email,:pass,:created_at,:updated_at)";
                try {
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fname' => $nombre,
                        ':lname' => $apellidos,
                        ':email' => $email,
                        ':pass' => $hashPassword,
                        ':created_at' => $date,
                        ':updated_at' => $date
                    ];

                    $handle->execute($params);
                    $success = 'User has been created successfully';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                $valFirstName = $nombre;
                $valLastName = $apellidos;
                $valEmail = '';
                $valPassword = $password;

                $errors[] = 'Email address already registered';
            }
        } else {
            $errors[] = "Email address is not valid";}
    } else {
        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            $errors[] = 'First name is required';
        } else {
            $valFirstName = $_POST['nombre'];
        }
        if(!isset($_POST['apellidos']) || empty($_POST['apellidos'])){
            $errors[] = 'Last name is required';
        } else {
            $valLastName = $_POST['apellidos'];
        }
        if(!isset($_POST['email']) || empty($_POST['email'])){
            $errors[] = 'Email is required';
        } else {
            $valEmail = $_POST['email'];
        }
        if(!isset($_POST['password']) || empty($_POST['password'])) {
            $errors[] = 'Password is required';
        } else {
            $valPassword = $_POST['password'];
        }
    }
}
echo $blade->run("register");
?>