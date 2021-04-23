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
        <table width="15%" align="center">
        <tr>
            <td>Usuario:</td>
            <td><label for="nombre_usuario"></label>
            <input type="text" name="login_user" id="nombre_usuario"></td>
        </tr>
        <tr>
            <td>Contraseña:</td>
            <td><label for="edad_usuario"></label>
            <input type="password" name="login_pass" id="contra_usuario"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="login" id="enviando" value="Iniciar Sesion"></td>
        </tr>
        </table>
    </form>
</body>
</html>