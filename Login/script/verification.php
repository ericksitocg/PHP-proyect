<?php

require_once("conexion.php");//Objeto conn

$login_user = $_POST["login_user"];
$login_pass = $_POST["login_pass"];

//Consulta en base para verificar si el usuario existe
$query = "SELECT * FROM USUARIOS WHERE USER = ? AND PASSWORD = ? ";
$stmt = $conn->prepare($query);
$stmt->execute(array($login_user,$login_pass));

if($stmt->rowCount()>0){
    //En caso de existir el usuario, se crea una sesion
    session_start();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //Se almacenan los datos compartidos por sesion en variables de sesion usando $_SESSION
    $_SESSION["id_usuario"] = $row["id"];

    header("location:../index.php");
}
else{
    header("location:../login.php");
}

?>