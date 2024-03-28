<?php

include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);

    $errores = array();

    $datos = [
    $nombre = (isset($_POST['nombre']))? $_POST['nombre']:null,
    $apellido = (isset($_POST['apellido']))? $_POST['apellido']:null,
    $mail = (isset($_POST['mail']))? $_POST['mail']:null,
    $password = (isset($_POST['password']))? $_POST['password']:null,
    $genero = (isset($_POST['genero']))? $_POST['genero']:null,
    $curso = (isset($_POST['curso']))? $_POST['curso']:null,
    $passwordvalidacion = (isset($_POST['passwordvalidacion'])? $_POST['passwordvalidacion']:null)
    ];

    if(empty($nombre)) {
        $errores['nombre'] = "Falta el nombre";
    }
    if(empty($apellido)) {
        $errores['apellido'] = "Falta el apellido";
    }
    if(empty($mail)) {
        $errores['mail'] = "Falta el mail";
    } elseif (!filter_var($datos[2], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] . "Formato de mail incorrecto";
    }
    if(empty($genero)) {
        $errores['genero'] = "Falta el genero";
    }
    if(empty($password) || strlen($password) < 6) {
        $errores['passsword'] = "Falta el password o es muy corto";
    } elseif ($password != $passwordvalidacion) {
        $errores['confirmarpassword'] = "Las contraseñas no coinciden";
    }

    foreach($errores as $error) {
        echo "<br>" . $error . "<br>";
    }

    // print_r($errores);

   // print_r($datos);

   if(empty($errores)) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=loginphp", $usuario, $contraseña);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para que PDO maneje los errores de manera automática

        $nuevoPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "
        INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `mail`, `password`, `genero`, `curso`) VALUES (NULL, :nombre, :apellido, :mail, :password, :genero, :curso);
        ";

        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array(
            ':nombre' => $datos[0],
            ':apellido' => $datos[1],
            ':mail' => $datos[2],
            ':password' => $nuevoPassword,
            ':genero' => $datos[4],
            ':curso' => $datos[5]
        ));

        header('Location: /projects/loginphp/loginpage.php');
        
        } catch (PDOException $e) {
        echo "Hubo un error " . $e->getMessage();
        };
   } else {
    // echo "Faltan datos";
   // print_r($errores);
   echo '<a href="/projects/loginphp/registropage.php"><button class="btn">Volver</button></a>';
   }


}

?>