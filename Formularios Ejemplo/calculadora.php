<?php

if(isset($_POST["button"])){//Cuando se presione el boton con name button

  $num1 = $_POST["num1"];//Obtener el valor de la etiqueta con name num1
  $num2 = $_POST["num2"];
  $op = $_POST["op"];

  calcular($op,$num1,$num2);

}

function calcular($operacion,$num1,$num2){
    if($operacion == "sum"){
        echo "La suma es: " . ($num1 + $num2);
    }
    if($operacion == "res"){
        echo "La resta es: " . ($num1 - $num2);
    }
    if($operacion == "mul"){
        echo "La multiplicacion es: " . ($num1 * $num2);
    }
    if($operacion == "div"){
        echo "La division es: " . ($num1 / $num2);
    }
    if($operacion == "mod"){
        echo "El modulo es: " . ($num1 % $num2);
    }
    if($operacion == "inc"){
        $num1++;
        echo "El numero 1 es: " . $num1;
    }
    if($operacion == "dec"){
        $num1--;
        echo "El numero 1 es: " . $num1;
    }
}

?>