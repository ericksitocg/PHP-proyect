<?php
//PDO---------------------------------------------------------------------------
/*PHP Document Object, intefaz orientada a objetos aplicable a varios motores de bases de datos*/

//Conexion usando libreria PDO

$servername = "localhost";
$database = "poemas";
$username = "root";
$password = "";

//String con los datos del servidor y la base de datos
$data_source_name = "mysql:host=$servername;dbname=$database";

try {
    //Objeto PDO con el usuario y el password
    $conn = new PDO($data_source_name, $username, $password);
    //Permite lanzar una excepcion a un error en la ejecucion
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    //CONSULTA PREPADA USANDO PDO

    $autor = "Gabriela Mistral";//$_GET["autor"];
    $titulo = "Atardecer";//$_GET["titulo"];

    $query = "SELECT * FROM POEMA WHERE AUTOR = ? AND TITULO = ?";
    //$query_marcadores = "SELECT * FROM POEMA WHERE AUTOR = :p_autor AND TITULO = :p_titulo";

    $stmt = $conn->prepare($query);
    //Execute recibe los parametros de la sentencia SQL en orden como un array
    $stmt->execute(array($autor,$titulo));

    //En caso de usar marcadores, execute recibe los parametros de la sentencia SQL usando los marcadores como clave los y como valor las variables
    //$stmt->execute(array("p_autor"=>$autor,"p_titulo"=>$titulo));


    echo "
    <table>
        <tr>
            <th>ID</th>
            <th>Contenido</th>
        </tr>
    ";
    //Recorre el resultado de la ejecucion de la consulta
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id = $row["ID"];
        $contenido = $row["contenido"];
        
        echo "
            <tr>
                <td>$id</td>
                <td>$contenido</td>
            </tr>
        ";
    }

    echo "</table>";

} catch (PDOException $e){
    die($e->getMessage());
}
finally{
    $conn=null;
}

?>