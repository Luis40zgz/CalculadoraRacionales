<?php
if(isset($_POST['submit'])){
    //Filtrado de las dos entradas
    $entrada_1 = htmlspecialchars($_POST['racional_1']);
    $entrada_2 = htmlspecialchars($_POST['racional_2']);

    //validación de los datos de entrada
    $evalucion_1 = Racional :: validar($entrada_1);
    $evalucion_2 = Racional :: validar($entrada_2);
    if()
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>CALCULADORA DE RACIONALES</h1>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <fiedset>
        <input type="text" name="racional_1" id="racional_1">
        <select name="operacion" id="operacion">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="x">x</option>
            <option value="÷">÷</option>
        </select>
        <input type="text" name="racional_2" id="racional_2">
        <button type="submit" name="calcular" value="1">Calcular</button>
    </fiedset>
</form>
</body>
</html>
