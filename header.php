<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="./style/main.css">
    <title><?php echo $title; ?></title>
</head>
<nav class="navegador" style="display: flex; width: 100%;">
    <ul style="list-style-type: none;">
        <li>
            <a href="/projects/loginphp/loginpage.php">Inicio</a>
        </li>
        <?php if ($_SESSION['usuario_id']) : ?>
            <li>
                <a href="/projects/loginphp/index.php">Dashboard</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>