<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Poemas</title>
</head>
<style>

body{
    font: oblique 120% cursive;
    background-color: #b0f2c2;
    }

button,a{
	background-color: violet;
}

h1{
    color: #ffffff;
    text-align:center;
}

p{
    text-align:center;
    color: green;
}

label{
    color: #ffffff;
}

img{
    display:block;
    margin:auto;
}

.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}

.btn-primary, .btn-primary:hover { border-color: pink; background-color: violet;}

</style>

<body>

<?php

require("conexion_info.php");

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<div class="container justify-center">
<div class="col-12">

<?php
//Recibiendo el ID del poema a leer
$id_poema =  mysqli_real_escape_string($conn,$_GET["read_id"]);

 /*Seguridad ante inyeccion SQL
Uso de CONSULTAS PREPARADAS 
----------------------------------------------------*/

$query_by_id = "SELECT * FROM POEMA WHERE ID = ?";

$stmt = mysqli_prepare($conn,$query_by_id);

$stmt_bind = mysqli_stmt_bind_param($stmt,"i",$id_poema);

$exec = mysqli_stmt_execute($stmt);

$asoc = mysqli_stmt_bind_result($stmt,$autor,$contenido,$titulo,$id);//Si usamos * se envia en el orden de la tabla

while(mysqli_stmt_fetch($stmt)){

    /*----------------------------------------------------*/

    echo "
    <div class='card'>
        <img src='img/cat.jpg' class='card-img-top'>
        <div class='card-body'>
            <h5 class='card-title'>$titulo</h5>
            <p class='card-text'>$contenido</p>

            <div class='d-grid gap-2 d-md-block'>
                <a href='update.php?upd_id=$id_poema' class='btn btn-primary'>Actualizar poema</a>
                <a href='confirm_del.php?del_id=$id_poema' class='btn btn-danger'>Borrar poema</a>
            </div>
            
            <a href='index.php' class='btn btn-primary'>Regresar al inicio</a>

        </div>
    </div>
    ";

}

mysqli_stmt_close($stmt);


?>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
