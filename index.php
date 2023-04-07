<?php
if (isset($_POST['submit']))
    require "controlador.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./img/calculadora.png">
    <link rel="stylesheet" href="./css/style.css">
    <title>Calculadora</title>
</head>
<body>
<h1>CALCULADORA DE RACIONALES</h1>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
        <div class="input_zone">
            <input type="text" name="racional_1" id="racional_1" value="<?=$operando_1??"";?>">
            <select name="operacion" id="operacion">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="x">x</option>
                <option value="÷">÷</option>
            </select>
            <input type="text" name="racional_2" id="racional_2" value="<?=$operando_2??"";?>">
        </div>
        <div class="error">
            <div>
                <?= $error_1 ?? "";?>
            </div>
            <div>
                <?= $error_2 ?? "";?>
            </div>
        </div>
        <hr>
        <div class="output_zone">
            <div class="action">
                <button type="submit" name="submit" value="1">Calcular</button>
            </div>
            <div class="result">
                <div class="screen">
                    <?= $salida ?? "";?>
                </div>
            </div>
        </div>
    </fieldset>
</form>
</body>
</html>
