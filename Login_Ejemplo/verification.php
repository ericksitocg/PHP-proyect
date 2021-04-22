<?php

$servername = "localhost";
$database = "proyectodaw";
$username = "root";
$password = "";

$data_source_name = "mysql:host=$servername;dbname=$database";

try {
    $conn = new PDO($data_source_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $login_user = $_POST["login_user"];
    $login_pass = $_POST["login_pass"];

    //Consulta en base para verificar si el usuario existe
    $query = "SELECT * FROM USER WHERE USER = ? AND PASSWORD = ? ";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($login_user,$login_pass));

    if($stmt->rowCount()>0){
        header("index.php");
    }
    else{
        header("login.php");
    }

}catch(Exception $e){
    die("Error: " . $e->getMessage());
}

?>