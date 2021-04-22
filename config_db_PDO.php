<?php
//PDO---------------------------------------------------------------------------
/*PHP Document Object, intefaz orientada a objetos aplicable a varios motores de bases de datos*/

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
    
    //---------------------------CONSULTA PREPADA USANDO PDO
    $autor = "Gabriela Mistral";//$_GET["autor"];
    $titulo = "Atardecer";//$_GET["titulo"];
    $query = "SELECT * FROM POEMA WHERE AUTOR = ? AND TITULO = ?";

    $stmt = $conn->prepare($query);
    //Execute recibe los parametros de la sentencia SQL en orden para asociarlo a la consulta
    $stmt->execute(array($autor,$titulo));

    echo "
    <table>
        <tr>
            <th>ID</th>
            <th>Contenido</th>
        </tr>
    ";

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