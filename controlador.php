<?php
$carga = fn($clase)=>require "$clase.php";
spl_autoload_register($carga);
if(isset($_POST['submit'])){
    // Filtrado de las dos entradas
    $entrada_1 = htmlspecialchars($_POST['racional_1']);
    $entrada_2 = htmlspecialchars($_POST['racional_2']);
    $operacion = htmlspecialchars($_POST['operacion']);

    // Validación de los datos de entrada
    $evaluacion_1 = Racional :: validar($entrada_1);
    $evaluacion_2 = Racional :: validar($entrada_2);

    // Gestion de los errores y creación de los operandos

    if($evaluacion_1){
        $operando_1 = new Racional($entrada_1);
    }else{
        $error_1 = "<p class='error_1'>El dato no es valido, por favor introduzca un racional</p>";
    }
    if($evaluacion_2){
        $operando_2 = new Racional($entrada_2);
    }else{
        $error_2 = "<p class='error_2'>El dato no es valido, por favor introduzca un racional</p>";
    }

    // Controlador de la calculadora
    if($evaluacion_1 && $evaluacion_2) {
        switch ($operacion) {
            case "+":
                $resultado = Racional::sumar($operando_1, $operando_2);
                break;
            case "-":
                $resultado = Racional::restar($operando_1, $operando_2);
                break;
            case "*":
                $resultado = Racional::multiplicar($operando_1, $operando_2);
                break;
            case ":":
                $resultado = Racional::dividir($operando_1, $operando_2);
                break;
            default:
                $error_operacion = "<h2> Sucedió un error inesperado, por favor intente realizar otra vez la operación.</h2>";
        }
    }

    // En caso de que se haya realizado una operación almaceno los valores a mostrar para pasaselos a la vista.

    if ($resultado??false){
        $salida = $resultado->mostrar_resultado();
    }
}
?>