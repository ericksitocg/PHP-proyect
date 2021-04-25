<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Inicio</title>
</head>
<body>
<?php
//Verificar si existe una session iniciada, y si en esa session se almaceno un usuario
session_start();
if(!isset($_SESSION["id_usuario"])){//Si no esta definida la variable "usuario" en $_SESSION, se redireccina
    header("location:login.php");
}
else{
    require_once("script/conexion.php");//Objeto conn

    $id_usuario = $_SESSION["id_usuario"];

    $query = "SELECT * FROM info_usuarios WHERE id_usuario = ? ";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($id_usuario));

    if($stmt->rowCount()>0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
        header("location:login.php");
    }

}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 30rem;">
            <img src="img/user.png" class="card-img-top" alt="Usuario registrado">
            <div class="card-body">
                <h5 class="card-title">Informacion de usuario</h5>
                <p class="card-text">Bienvenido: <?php echo $row["nombre"]; ?></p>

                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <a class="btn btn-primary" href="info.php">Descripcion</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a class="btn btn-primary" href="script/close_sesion.php">Cerrar sesion</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>