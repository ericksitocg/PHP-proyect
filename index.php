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

//Recorrer un arreglo
foreach ($arreglo_visitantes as $i) {//($arreglo_visitantes as $clave => $valor)
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

$_GET para realizar una consulta, obtener datos
$_POST para realizar un registro, crear datos

*/

?>
