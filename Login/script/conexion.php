<?php

require_once("conexion_info.php");

$data_source_name = "mysql:host=$servername;dbname=$database";

try {
    $conn = new PDO($data_source_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){
    die("Error: " . $e->getMessage());
}
?>