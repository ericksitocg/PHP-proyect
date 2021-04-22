<?php
    //PROCEDIMENTAL (MySQLI)-------------------------------------------------------------------

    //Conexion usando libreria mysqli
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

    //CONSULTA DIRECTA [NO PREPARADA]-----------------------------------------------------------
    
    $query = "select * from categorias;";
    //Uso de LIKE % para sentencia de caracteres y _ para un solo caracter
    $query_like = "select * from categorias where campo LIKE '% caballero';";
    $result = mysqli_query($conn,$query);//Se usa para las demas funciones

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

    //[OPCIONAL]Presentar los nombres de los campos (columnas)
    /*for($column = 0;$column< mysqli_num_fields($result);$column++){
        $column_name = mysqli_fetch_field_direct($result,$column);//Objeto [solo en este caso]
        echo $column_name -> name . " | ";//-> se refiere a una propiedad de un objeto
    }
    echo "<br>";*/

    //mysqli_close($conn); //Cerrar sesion luego de terminar todas las consultas


    //CONSULTAS PREPARADAS ----------------------------------------------- [Buscador de poemas/read.php]
    //Funciones que implementa seguridad y eficiencia al ejecutar un query, haciendo una preparacion a la consulta de forma que solo se necesita procesar una vez, de ahi solo recibe parametros.


    //1)Escribir la sentencia SQL sustituyendo los valores de las variables con el simbolo ?
    $query = "SELECT TITULO FROM POEMA WHERE AUTOR = ?";

    //2)Preparar la consulta
    $stmt = mysqli_prepare($conn,$query);//->Devuelve [objeto mysqli_stmt]!!

    //3)Unir parametros de la sentencia SQL con las variables de los datos enviados por formulario
    //Se usa el objeto mysqli_stmt , un string con los TIPOS de datos de la variable y las variables recuperadas del formulario
    $autor = $_GET['autor'];
    $stmt_bind = mysqli_stmt_bind_param($stmt,"s",$autor);//[True o False]

    //4)Ejecutar la consulta [True o False]
    $exec = mysqli_stmt_execute($stmt);

    //5)Asociar variables para almacenar cada campo (columna) del resultado de una consulta de SELECCION.
    $asoc = mysqli_stmt_bind_result($stmt,$titulo_resultado);

    //6)Lectura de valores 
    while(mysqli_stmt_fetch($stmt)){
        echo "<p>$titulo_resultado<p>";
    }

    //7)Cerrar la sesion
    mysqli_stmt_close($stmt);

?>