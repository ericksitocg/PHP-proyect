<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <form action="verification.php" method="post">
        <label >Usuario:</label>
        <input type="text" name="login_user">
        <label >Contraseña:</label>
        <input type="password" name="login_pass">

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>