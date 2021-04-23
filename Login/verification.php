<?php

$servername = "localhost";
$database = "login_example";
$username = "root";
$password = "";

$data_source_name = "mysql:host=$servername;dbname=$database";

try {
    $conn = new PDO($data_source_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $login_user = $_POST["login_user"];
    $login_pass = $_POST["login_pass"];

    //Consulta en base para verificar si el usuario existe
    $query = "SELECT * FROM USUARIOS WHERE USER = ? AND PASSWORD = ? ";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($login_user,$login_pass));

    if($stmt->rowCount()>0){
        //En caso de existir el usuario, se crea una sesion
        session_start();
        //Se almacenan los datos compartidos por sesion en variables de sesion usando $_SESSION
        $_SESSION["usuario"] = $login_user;

        header("location:index.php");
    }
    else{
        header("location:login.php");
    }

}catch(Exception $e){
    die("Error: " . $e->getMessage());
}

?>