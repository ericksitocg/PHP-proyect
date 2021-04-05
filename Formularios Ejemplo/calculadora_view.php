<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Calculadora PHP</title>
</head>

<body>

<p>&nbsp;</p>
<form name="form1" method="post" action="calculadora.php">
  <p> 
    <label for="num1"></label>
      <input type="text" name="num1" id="num_1">
    <label for="num2"></label>
      <input type="text" name="num2" id="num_2">
    <label for="operacion"></label>
    <select name="op" id="operacion">
      <option value="sum">Suma</option>
      <option value="res">Resta</option>
      <option value="mul">Multiplicación</option>
      <option value="div">División</option>
      <option value="mod">Módulo</option>
      <option value="inc">Incrementar</option>
      <option value="dec">Decrementar</option>
    </select>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Enviar" onClick="prueba">
  </p>
</form>
<p>&nbsp;</p>

</body>
</html>