<?php
/*
To kill a process by its PID, type the command:
taskkill /F /PID pid_number
*/

//Variables
$connection = "MongoDB";
$port = 8080;

//Operador de concatenacion es . y las variables puede estar dentro de los strings

echo "El motor de bases de datos a usar es: $connection y el puerto a usar: " . $port . "<br>";//Etiqueta HTML

//Funciones

function saludar(){
    echo "Saludos, desde el servidor <br>";
}

//Importacion de codigo desde un archivo externo

include("funciones.php");

/*
Tambien se puede usar "require" en lugar de "include" para que en caso de no existir el archivo php
se rompa el flujo de ejecución y el programa se detenga.
Usando "include" el programa continua a pesar de los errores generados por la falta el archivo php.
*/

saludar_externo();

//Ambitos de las variables

$perro = "bombon <br>"; 

function cambiar(){
    $perro = "Cuco"; //Variable local,solo existe dentro de la funcion
    static $numero = 0; /*Variable estatica, se mantiene su valor aun despues de terminar la funcion
    A diferencia de una variable global, no puede ser accedida desde fuera la funcion*/
    echo $numero++ . "<br>";//Aumenta cada vez que se llama a una funcion
}

cambiar();
cambiar();

echo $perro;//Toma en cuenta la variable fuera de la funcion, para evitar sobreescritura

//String
$frase = "El perro se llama $perro <br>";
$frase_literal = 'El perro se llama $perro <br>';//No se toma la variable sino el caracter $ 

echo "Uso de 'comillas' simples, dentro de comillas dobles<br>";

/*Comparacion de strings*/

$resultado = strcmp($frase,$frase_literal);//Devuelve 1 si no son iguales, 0 si son iguales
/*strcasecmp no toma en cuenta las mayusculas y minusculas*/

if($resultado){
    echo "Los strings no son iguales<br>";
}
else{
    echo "Los strings son iguales<br>";
}

//Constantes

define("CONSTANTE","Yo soy inevitable<br>");

echo "El valor de la constante es: " . CONSTANTE;//No puede estar dentro de un string, No lleva $

//Lista de constantes predefinidas en php: __LINE__

//Funciones matematicas del lenguaje
//https://www.php.net/manual/es/ref.math.php

echo "Numero aleatorio como resultado final: " . rand(0,100) . "<br>";

//Casting IMPLICITO, php convierte el tipo de dato segun el contenido de la varible

$var_entera = 3;
$var_string = "3";
$var_float = 3.0;

//Si se realiza una operacion sobre la varible, se realiza un re - casting, dependiendo del resultado de la operacion

$var_string+=1;//Ahora es entero, porque se le suma un entero

$var_string+=1.5;//Ahora es flotante, porque se le suma un flotante

//Casting EXPLICITO

$resultad = (int)$var_float;
$resultad_2 = (string)$var_entera;
$resultad_3 = (float)$var_string; 

//Condicionales

//&& tiene mayor prioridad que and (SIEMPRE) usar && y ||

$nombre = "Erick";
$edad = 20;
$contrasenia = "gato";

if($edad < 18){//Entra solamente a uno de las opciones y luego se sale de la estructura
    echo "Eres menor de edad<br>";
}
else if($edad < 25){
    echo "Eres joven<br>";
}
else{
    echo "Eres mayor de edad<br>";
}

//Operador ternario

$respuesta = ($edad<18 && $contrasenia=="1234") ? "Accesso concedido" : "Acceso denegado";

echo $respuesta . "<br>";

//Switch case, solo evalua igualdad NO es muy recomendado

switch($nombre){

    case "Erick":

        echo "Bienvenido, erick<br>";

        break;

    case "Nataly":
        echo "Bienvenida, Nataly<br>";

        break;

    default:

        echo "Usuario no autorizado<br>";

}
//Bucle while

$var_while = 1;
while($var_while<=4){
    echo "$var_while" . "<br>";
    $var_while++;
}

//Bucle for

for($i=1;$i<4;$i++){
    echo $i . "<br>";
}

//Paso de parametros por valor (Por defecto)

function presentar($parametro){
    echo $parametro++;
}

//Paso de parametros por referencia

function modificar(&$parametro){
    echo $parametro++;
}

//Arrays

$arreglo_visitantes = [1,2,"Hello"];//Indexados
array_push($arreglo_visitantes,9,23);

$arreglo_empleados = ["VIP"=>"Homero","Normal"=>"Sasha",2=>"eo"];//Asociativos (actua como diccionario)
$arreglo_empleados["Emergencia"] ="Medico";

//Recorrer un arreglo indexado
foreach ($arreglo_visitantes as $i) {//($arreglo_visitantes as $clave => $valor)
    //echo $i . "<br>";
}

//Recorrer un arreglo asociativo (diccionario)
foreach ($arreglo_empleados as $clave => $valor){
    //echo $i . "<br>";
}

for($i=0;$i<count($arreglo_visitantes);$i++){
    //echo $arreglo_visitantes[$i] . "<br>";
}

$mega_arreglo = [[1,2,3],[5,6,7],"hola"];

echo $mega_arreglo[0][2];

var_dump($mega_arreglo);

/*
La diferencia entre $_GET y $_POST es que la primera envía la información al servidor utilizando la barra de URL
como medio de transporte [VISIBLE], mientras que la segunda se envía vía http con el cuerpo del mensaje de forma transparente
para el usuario[NO VISIBLE].

<form action="busqueda.php" method="get" name="datos_usuario" id="datos_usuario">

$_GET para realizar una consulta,enviar parametros sencillos como id, se envia por la url, usando <a>
$_POST para realizar un registro, enviar parametros largos como el contenido o titulo,se envia por <form>

*/

//-------------------------------COMUNICACION ENTRE PAGINAS
/*
Uso de formularios, se indica la pagina php donde seran recibidos los datos [POST]
Uso de enlaces <a>, se indica la url formado por:La pagina donde seran recibidos y los parametros que seran enviados [GET]

<a href='read.php?read_id=$id_poema'  class='btn btn-primary' >Presentar</a>

*/

//Tipo de consultas SQL y manejo PROCEDIMENTAL
/*
Consultas de seleccion
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        }
    }

Consulta de accion: INSERT,UPDATE,DELETE

    $result = mysqli_query($conn,$query_del);
    $row_affected = mysqli_affected_rows($conn);

    if($row_affected>0){
        $last_id = mysqli_insert_id($conn);
        
    }

*/

//Proteccion ante inyeccion SQL MYSQL--------------------------------[buscador de poemas/read.php]
/*
Ejemplo de inyeccion, ingresar en el campo del formulario: ' or '1'='1
USO DE REAL_ESCAPE_STRING()
Se agrega la funcion para limpiar caracteres extraños al parametro recibido

$busq_autor = mysqli_real_escape_string($conn,$_GET["autor"]);
*/

//Sesiones
/*
La implementacion de sesiones permite dar persistencia a los datos (en el servidor) al momento de navegar entre las páginas que lo usen.
Se inicia sesion en la pagina y se crea una variable de sesion usando la variable global $_SESSION para almacenar los datos compartidos
*/

$user = "el_nombre_de_usuario";

session_start();

/*Para verificar el estado de una session se usa session_status() el cual devuelve un entero:
_DISABLED = 0
_NONE = 1
_ACTIVE = 2
*/
echo "El estado de sesion es : " . session_status() . "<br>";

$_SESSION["usuario"] = $user;//Variable de sesion, que podra ser accedida desde otra pagina con la misma sesion

/*Para cerrar la sesion se usa: */

session_destroy();

echo "El estado de sesion es : " . session_status() . "<br>";

//Cookies
/*
La implementacion de cookies permite dar persistencia a los datos de navegacion (en el cliente), de forma que las paginas puedan leer esta informacion
desde la pc y usarlas para mejorar la navegacion en las paginas, usualmente se usa para almacenar las preferencias de navegacion.
La cookie se crea con: el par clave - valor y tiempo de vida,usado la funcion setcookie y se lee desde la variable super global $_COOKIE
*/
setcookie("clave","valor",time() + 30);//La cookie solo estara disponible 30 segundos

if(isset($_COOKIE["clave"])){//Accesible desde varias paginas
    echo "<p>Lo que hay en la cookie 'clave' es: " . $_COOKIE["clave"];
}

/*
Las cookies por defecto solo pueden ser leidas por paginas que esten en su mismo directorio, o en directorios secundarios a el [carpetas hijas]
*/

//Hash-Password
/*
Las contraseñas se deben almacenar hasheadas en la base de datos, es decir ILEGIBLES
Para ecriptar la contraseña, usamos la funcion password_hash() y para verificar una contraseña encriptada usamos password_verify()
*/
$pass = "contrasenia";
$pass_encrip= password_hash($pass,PASSWORD_DEFAULT);

$user_pass = "password";

if(password_verify($user_pass,$pass_encrip)){
    echo "Contraseña correcta";
}else{
    echo "Contraseña incorrecta";
}
//Paginacion

$rec_x_pag = 10;//Cuantos registros por cada pagina

if (isset($_GET["pag"])){
    $pag = $_GET["pag"];//Recibo por get la pagina, siempre antes de un valor &a=#
}
else{
    $pag = 1;
}

$rec_inicio = ($pag - 1)*$rec_x_pag;

/*Query para contar el total de registros*/

$query_count = "SELECT COUNT(*) as 'c' FROM POEMA WHERE AUTOR LIKE '%$busq_autor%'";

$rec_total = mysqli_query($conn,$query_count)->fetch_object()->c;

/*Query para aplicar LIMIT inicio, salto*/

$query_by_autor = "SELECT * FROM POEMA WHERE AUTOR LIKE '%$busq_autor%' LIMIT $rec_inicio, $rec_x_pag ;";

$result = mysqli_query($conn,$query_by_autor);

/*Elemento paginacion HTML*/

for($i=$pag;$i<=$pag;$i++){//Pasando por parametro la pagina
    echo "<li class='page-item'><a class='page-link' href='index.php?autor=$busq_autor&pag=$i&buscar=#'>$i</a></li>";
}


?>
