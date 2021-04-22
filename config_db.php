<?php
    //PROCEDIMENTAL (MySQLI)-------------------------------------------------------------------

    $servername = "localhost";
    $database = "proyectodaw";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully<br>";
    //Realizar una consulta
    $query = "select * from categorias;";

    //Uso de LIKE % para sentencia de caracteres y _ para un solo caracter

    $query_like = "select * from categorias where campo LIKE '% caballero';";

    $result = mysqli_query($conn,$query);//Se usa para las demas funciones

    //----------------------------------------------------------------------------
    //Presentar los nombres de los campos (columnas)
    for($column = 0;$column< mysqli_num_fields($result);$column++){
        $column_name = mysqli_fetch_field_direct($result,$column);//Objeto [solo en este caso]
        echo $column_name -> name . " | ";//-> se refiere a una propiedad de un objeto
    }
    //----------------------------------------------------------------------------
    echo "<br>";

    //Informacion de la tabla
    if (mysqli_num_rows($result) > 0) {
        // Recorrer por filas, -- nombre de columna como clave
        while($row = mysqli_fetch_assoc($result)) {
          echo "|ID: " . $row["categoria_id"]. " | Name: " . $row["categoria"] . " | " . $row["created_at"] . " | " .  $row["updated_at"]. "<br>";
        }
    }
    else {
        echo "0 results";
    }

    mysqli_close($conn);

?>