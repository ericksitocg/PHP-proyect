<style>
	h1{
		text-align:center;
	}

	table{
		background-color:#FFC;
		padding:5px;
		border:#666 5px solid;
	}
	
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}


</style>

<?php

//isset -> 1 cuando se presione el boton
//$_POST -> El valor de la etiqueta con el name

if(isset($_POST["enviando"])){//verifica que se presione el boton con el name enviando

  $usuario = $_POST["nombre_usuario"];//$_POST permite obtener el valor de la etiqueta con id nombre_usuario
  $edad = $_POST["edad_usuario"];

  if($usuario == "Erick" && $edad > 18){
    echo "<h1 class='validado'>Bienvenido $usuario</h1>";//La clase debe estar definida en el mismo archivo php
  }
  else{
    echo "<h1 class='no_validado'>Usuario $usuario no autorizado</h1>";
  }

}

?>