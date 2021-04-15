<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Borrar un poema</title>
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
}

label{
    color: #ffffff;
}

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
<a href="index.php"><img src="img/cat_potato.jpg" width="150" height="125" alt="Pagina princial"></a>
<h1>Eliminar un poema</h1>
    <form action="" method="post">

        <div class="row">
            <label for="colFormLabelLg" class="col-sm-10 col-form-label col-form-label-lg">Numero del poema</label>
            <input type="text" class="form-control form-control-lg" id="titulo" name="del_id">
        </div>
        <div class="row">
            <button type="submit" name="del_poema">Borrar poema</button>
        </div>
    </form>
</div>

<?php
    if(isset($_POST["del_poema"])){//Evento de boton BORRAR

        //Primer query de consulta para obtener datos del poema por ID
        $id_poema = $_POST["del_id"];
        $query_sel = "SELECT * FROM poema WHERE ID = '$id_poema';";
        $result_select = mysqli_query($conn,$query_sel);
    
        if (mysqli_num_rows($result_select) > 0) {
            while($row = mysqli_fetch_assoc($result_select)) {

                $autor = $row["autor"];
                $titulo = $row["titulo"];

                //Segundo query de accion para eliminar el poema por ID
                $query_del = "DELETE FROM poema WHERE ID = '$id_poema';";
                $result = mysqli_query($conn,$query_del);
                $row_affected = mysqli_affected_rows($conn);

                if($row_affected>0){
                    echo "Se elimino el poema numero $id_poema: '\t $titulo \t' de $autor<br>";
                }
                else{
                    echo "No existen poemas con el titulo $titulo";
                }
        
            }
        }
    }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
