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
    <a href="index.php"><img src="img/cat_potato.jpg" width="150" height="125" alt="Pagina princial"></a>

<?php

    //Primer query de consulta para obtener datos del poema por ID
    $id_poema = mysqli_real_escape_string($conn,$_GET["del_id"]);

    if($id_poema != ""){

        $query_sel = "SELECT * FROM poema WHERE ID = '$id_poema';";
        $result_select = mysqli_query($conn,$query_sel);
    
        if (mysqli_num_rows($result_select) > 0) {
            $row = mysqli_fetch_assoc($result_select);

            $autor = $row["autor"];
            $titulo = $row["titulo"];

            //Segundo query de accion para eliminar el poema por ID
            $query_del = "DELETE FROM poema WHERE ID = '$id_poema';";
            $result = mysqli_query($conn,$query_del);
            $row_affected = mysqli_affected_rows($conn);

            if($row_affected>0){
                header("index.php");
            }
            else{
                echo "<h1>No se puedo eliminar el poema: '\t $titulo \t' de $autor</h1>";
            }
        }
        else{
            echo "<h1>El poema no existe</h1>";
        }

    
    }

?>
    <a href='index.php' class='btn btn-primary'>Regresar al inicio</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
