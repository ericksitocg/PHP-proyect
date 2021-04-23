<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion</title>
</head>
<body>
<?php
//Verificar si existe una session iniciada, y si en esa session se almaceno un usuario
session_start();
if(!isset($_SESSION["usuario"])){//Si no esta definida la variable "usuario" en $_SESSION, se redireccina
    header("location:login.php");
}
?>
    <h1>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h1>
    <h2>Pagina de informacion</h2>

    <a href="index.php">Inicio</a>
    <a href="close_sesion.php">Cerrar sesion</a>

    <p>Solo disponible para usuarios que han iniciado session</p>
</body>
</html>