<?php

session_start();//Si existe se reanuda

session_destroy();//Si no existe, se eliminar y termina en el mismo estado [sin sesion]

header("location:../login.php")
?>