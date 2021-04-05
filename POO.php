<?php

//Objeto: Resprentacion de una entidad del mundo real en programacion, tiene atributos (caracteristicas) y metodos (funcionalidades)

//Clase: Plantilla o modelo de un objeto donde se describen sus atributos pero no se especifican

//Instancia: Creacion de un objeto unico en base a una clase, especificando los atributos que lo componen

/* Un OBJETO es la INSTANCIA de una CLASE */

//https://www.php.net/manual/es/language.oop5.php

//Creacion de clase

class Coche{

    private $ruedas;//Atributos
    private $color;
    private $capa_motor;//Encapsulamiento de atributo solo permite acceder desde la clase
                        //Tampoco pueden acceder las clases que hereden de Coche, deberia ser protected
                        //Para poder modificar el atributo, se implementan los metodos GETTERS y SETTERS

    function __construct($color,$capacidad){//Constructor
        $this->ruedas = 4;
        $this->color = $color;
        $this->capa_motor = $capacidad;
    }

    function presentar(){//Metodos
        echo "Soy un coche de color " . $this->color . " y tengo una capacidad de " . $this->capa_motor ."<br>";
    }

}

//Uso de clase

$chev = new Coche("verde",1000);
//$chev->ruedas = 6; Error debido a que ruedas es private y solo puede ser modificado desde un setter
$chev->presentar();

//Importar una clase
//require_once("clase.php");

//Herencia

class Camion extends Coche{

    static $licencia = "B";//Un atributo o funcion estatica permance a la CLASE es decir es compartida por todas las instancias

    function __construct($color){//Constructor
        $this->ruedas = 8;
        $this->color = $color;
        $this->capa_motor = 5000;
    }

    //Sobre escritura de metodos
    function presentar(){
        echo "Soy un camion de color " . $this->color . " y tengo una capacidad de " . $this->capa_motor;
    }

    //Uso de metodo del padre
    function detalles(){
        parent::presentar();
        echo "ID: 123456";
    }
    
}

$quia = new Camion("gris");
$quia->presentar();

?>