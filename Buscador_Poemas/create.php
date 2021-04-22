<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Agrega tu poema</title>
</head>
<style>

body{
    font: oblique 120% cursive;
    background-color: #b0f2c2;
    }

button{
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

img{
    display:block;
    margin:auto;
}

label{
    color: #ffffff;
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

<div class="container">
<a href="index.php"><img src="img/cat_index.jpg" width="400" height="200" alt="Pagina principal"></a>
<h1>Crear un poema</h1>

    <form action="" method="post">
        <div class="row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Autor</label>
            <input type="text" class="form-control form-control-lg" id="autor" name="add_autor">
        </div>
        <div class="row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Titulo</label>
            <input type="text" class="form-control form-control-lg" id="titulo" name="add_titulo">
        </div>
        <div class="row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Contenido</label>
            <!--<input type="text" class="form-control form-control-lg" id="texto" name="add_contenido">-->
            <textarea class="form-control form-control-lg" id="texto" name="add_contenido" rows="3">
            </textarea>
        </div>
        <div class="row">
            <button type="submit" name="add_poema" class='btn btn-primary'>Agregar poema</button>
        </div>
        <a href='index.php' class='btn btn-primary'>Regresar al inicio</a>
    </form>
</div>

<?php
    if(isset($_POST["add_poema"])){//Evento de boton AGREGAR

        $autor = mysqli_real_escape_string($conn,$_POST["add_autor"]);
        $titulo = mysqli_real_escape_string($conn,$_POST["add_titulo"]);
        $contenido = mysqli_real_escape_string($conn,$_POST["add_contenido"]);

        if($autor!="" && $titulo!="" && $contenido!=""){

            $query_add = "INSERT INTO poema (autor, titulo, contenido) VALUES ('$autor', '$titulo', '$contenido');";

            $result = mysqli_query($conn,$query_add);

            $row_affected = mysqli_affected_rows($conn);

            if($row_affected>0){

                $id_poema = $row_affected['ID'];

                echo "<p>Se agrego el poema $titulo de $autor</p>";
                $last_id = mysqli_insert_id($conn);
                echo "<a href='read.php?read_id=$last_id' class='btn btn-primary'>Leer el poema agregado</a>";
            }
            else{
                echo "<p>No se pudo registrar el poema</p>";
            }
        }
        else{
            echo "<p>Complete los campos para agregar el poema</p>";
        }
    }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
