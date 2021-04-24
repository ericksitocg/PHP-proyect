<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Informacion</title>
</head>
<style>
h1,h2 {
    text-align: center;
}
</style>
<body>
<?php
//Verificar si existe una session iniciada, y si en esa session se almaceno un usuario
session_start();
if(!isset($_SESSION["usuario"])){//Si no esta definida la variable "usuario" en $_SESSION, se redireccina
    header("location:login.php");
}
?>
<div class="container">
    <div class="row justify-content-center">
        <h1>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h1>
        <h2>Pagina de informacion</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <a class="btn btn-primary" href="index.php">Inicio</a>
        </div>
        <div class="col-md-6 text-center">
            <a class="btn btn-primary" href="close_sesion.php">Cerrar sesion</a>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>