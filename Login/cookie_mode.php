<?php

if(isset($_COOKIE["mode"])){//Si existe la cookie, cambia el color

    $mode = $_COOKIE["mode"];

    if($mode=="dark"){
        setcookie("mode","light", time() + 36000,);
    }
    else{
        setcookie("mode","dark", time() + 36000);
    }
}
else{
    //Si no existe la cookie la crea por primera vez
    setcookie("mode","light", time() + 36000);
}

$pagina = $_GET["pag"];//Pagina de origen
header("Location:$pagina.php")

?>