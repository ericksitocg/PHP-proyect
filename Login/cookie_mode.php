<?php

if(isset($_GET["mode"])){

    $mode = $_GET["mode"];

    if($mode=="dark"){
        setcookie("mode","dark", time() + 36000,);
        header("Location:index_dark.php");
    }
    else{
        setcookie("mode","light", time() + 36000);
        header("Location:index.php");
    }
}
else{
    setcookie("mode","light", time() + 36000);
    header("Location:index.php");
}

?>