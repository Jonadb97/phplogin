
<?php
$title = "Bienvenido";
include 'header.php';

session_start();

if(!isset($_SESSION['usuario_id'])) {
    header('Location: /projects/loginphp/loginpage.php');
    exit();
}
?>
<body>
<h2>Bienvenido <?php echo $_SESSION['usuario_nombre']; ?>!</h2>
<p>Estás adentro</p>
<br>

<a class="btn" href="cerrar.php">Cerrar sesión</a>
</body>
</html>