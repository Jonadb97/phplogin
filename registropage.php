<?php
$title = "Registro";
require_once 'header.php';
?>
<body>
    <h2>Formulario de registro</h2>
    <form action="registro.php" method="post" class="form-group formulario-registro">

        Nombre:
        <input type="text" name="nombre" id="" class="form-input" required><br>
        Apellido:
        <input type="text" name="apellido" id="" class="form-input" required><br>
        Mail:
        <input type="text" name="mail" id="" class="form-input" required><br>
        Password:
        <input type="password" name="password" id="" class="form-input" required><br>
        Confirmar password:
        <input type="password" name="passwordvalidacion" id="" class="form-input" required><br>
        Género:
        <select name="genero" id="genero" class="form-select" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="No binario">No binario</option>
        </select>
        Curso de interés:
        <select name="curso" id="curso" class="form-select">
            <option value="php">PHP</option>
            <option value="python">Python</option>
            <option value="javascript">Javascript</option>
            <option value="laravel">Laravel</option>
            <option value="java">Java</option>
            <option value="jquery">JQuery</option>
            <option value="basesdedatos">Bases de datos</option>
            <option value="otro">Otro</option>

        </select>

        

        <button type="submit" class="btn">Registrar</button>

    </form>
</body>
</html>