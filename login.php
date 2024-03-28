<?php

include("conexion.php");

$login = false;

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_POST);

    $errores = array();

    $mail = (isset($_POST['mail']))?htmlspecialchars($_POST['mail']): null;
    $password = (isset($_POST['password']))?$_POST['password']: null;

    if(empty($mail)) {
        $errores['mail'] = "Falta el mail";
    } elseif (!filter_var($datos[2], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] . "Formato de mail incorrecto";
    }

    if(empty($password) || strlen($password) < 6) {
        $errores['passsword'] = "Falta el password o es muy corto";
    } elseif ($password != $passwordvalidacion) {
        $errores['confirmarpassword'] = "Las contraseñas no coinciden";
    }

    try{
        $pdo = new PDO("mysql:host=$host;dbname=loginphp", $usuario, $contraseña);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para que PDO maneje los errores de manera automática

        $sql = "SELECT * FROM usuarios WHERE mail=:mail";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(['mail' => $mail]);

        $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // print_r($usuarios);

        foreach ($usuarios as $user) {
            if (password_verify($password, $user["password"])) {
            //if($password == $user['password']) {
                $_SESSION['usuario_id'] = $user["id"];
                $_SESSION['usuario_nombre'] = $user["nombre"];
                $login = true;
            }
        }

        if($login) {
            echo "Existe el usuario";
            header('Location: /projects/loginphp/index.php');
        } else {
            echo "No existe el usuario";
            echo '<a href="/projects/loginphp/loginpage.php"><button class="btn">Volver</button></a>';
        }

    } catch(PDOException $e) {

    }
}