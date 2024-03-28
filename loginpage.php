<?php
$title = "Login";
include 'header.php';
?>
<body>
    <h2>Iniciar sesión</h2>
    <form action="login.php" method="post" class="card login-card">

        Mail:
        <input type="text" name="mail" id="" class="form-input"><br>
        Password:
        <input type="password" name="password" id="" class="form-input"><br>
        <button class="btn" type="submit">Iniciar sesión</button>
    </form>
    <a class="btn-registro" href="/projects/loginphp/registropage.php"><button class="btn">Registrarse</button></a>
</body>
</html>