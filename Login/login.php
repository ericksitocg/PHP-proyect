<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Inicio de sesion</title>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <form action="script/verification.php" method="post">
      <div class="col-md-6 mx-auto">
        <label for="for_login_user" class="form-label">Usuario</label>
        <input type="text" class="form-control" name="login_user" id="nombre_usuario" aria-describedby="usuario">
      </div>
      <div class="col-md-6 mx-auto">
        <label for="for_login_pass" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="login_pass" id="contra_usuario">
      </div>
      <div class="col-md-6 mx-auto">
        <button type="submit" class="btn btn-primary" name="login" id="enviando">Iniciar Sesion</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>