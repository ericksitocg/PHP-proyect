<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
<?php
//Verificar si existe una session iniciada, y si en esa session se almaceno un usuario
session_start();
if(!isset($_SESSION["usuario"])){//Si no esta definida la variable "usuario" en $_SESSION, se redireccina
    header("location:login.php");
}
?>
    <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="Usuario registrado">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION["usuario"]; ?></h5>
            <p class="card-text">Bienvenido: <?php echo $_SESSION["usuario"]; ?></p>
            <a href="info.php">Informacion</a>
            <a href="close_sesion.php">Cerrar sesion</a>

        </div>
    </div>

    <p>Solo disponible para usuarios que han iniciado session</p>
</body>
</html>