<?php

class Racional
{
    private int $numerador;
    private int $denominador;

    const ERROR = false;
    const RACIONAL = true;
    public static function validar(string $entrada) : bool
    {
        $patron = "#^[0-9]+/[1-9][0-9]*$#";
        if(preg_match($patron, $entrada)){
            return Racional::RACIONAL;
        }else {
            return Racional::ERROR;
        }
    }
    public function __construct( string|int $entrada, int $denominador = null)
    {
        if (!is_numeric($entrada)) {
            $datos = explode("/", $entrada);
            $this->numerador = (int)$datos[0];
            $this->denominador = (int)$datos[1];
        }else{
            $this->numerador = $entrada;
            $this->denominador = $denominador;
        }
    }
    public function getNumerador(): int
    {
        return $this->numerador;
    }
    public function getDenominador(): int
    {
        return $this->denominador;
    }
    private function setNumerador(int $value) : void {
        $this->numerador = $value;
    }
    private function setDenominador(int $value) : void {
        $this->denominador = $value;
    }
    private static function obtener_operandos(Racional $operando_1, Racional $operando_2 ) : array
    {
        $operandos [] = $operando_1->getNumerador();
        $operandos [] = $operando_1->getDenominador();
        $operandos [] = $operando_2->getNumerador();
        $operandos [] = $operando_2->getDenominador();
        return $operandos;
    }
    public static function sumar(Racional $operando_1, Racional $operando_2 ) : Racional{
        $operandos = Racional::obtener_operandos($operando_1, $operando_2);
        $sumando_1 = $operandos[0] * $operandos[3];
        $suamndo_2 = $operandos[2] * $operandos[1];
        $resultado_numerador = $sumando_1 + $suamndo_2;
        $resultado_denominador = $operandos[1] * $operandos[3];
        $resultado = new Racional($resultado_numerador, $resultado_denominador);
        $resultado->simplificar();
        return $resultado;
    }
    public static function restar(Racional $operando_1, Racional $operando_2 ) : Racional{
        $operandos = Racional::obtener_operandos($operando_1, $operando_2);
        $restando_1 = $operandos[0] * $operandos[3];
        $restando_2 = $operandos[2] * $operandos[1];
        $resultado_numerador = $restando_1 - $restando_2;
        $resultado_denominador = $operandos[1] * $operandos[3];
        $resultado = new Racional($resultado_numerador, $resultado_denominador);
        $resultado->simplificar();
        return $resultado;
    }
    public static function multiplicar(Racional $operando_1, Racional $operando_2 ) : Racional{
        $operandos = Racional::obtener_operandos($operando_1, $operando_2);
        $resultado_numerador = $operandos[0] * $operandos[2];
        $resultado_denominador = $operandos[1] * $operandos[3];
        $resultado = new Racional($resultado_numerador, $resultado_denominador);
        $resultado->simplificar();
        return $resultado;
    }
    public static function dividir(Racional $operando_1, Racional $operando_2 ) : Racional{
        $operandos = Racional::obtener_operandos($operando_1, $operando_2);
        $resultado_numerador = $operandos[0] * $operandos[3];
        $resultado_denominador = $operandos[1] * $operandos[2];
        $resultado = new Racional($resultado_numerador, $resultado_denominador);
        $resultado->simplificar();
        return $resultado;
    }
    public function __toString(){
        return "$this->numerador/$this->denominador";
    }
    public function mostrar_resultado():string{
        return "<p class=\"num\">$this->numerador</p><hr class=\"slash\"><p class=\"den\">$this->denominador</p>";
    }
    private function simplificar() : void {
        $num_1 = $this->numerador;
        $num_2 = $this->denominador;
        function gcd($a,$b)
        {
            return ($a % $b) ? gcd($b, $a % $b) : $b;
        }
        $gcd = gcd($num_1, $num_2);
        $this->setNumerador($this->numerador/$gcd);
        $this->setDenominador($this->denominador/$gcd);

    }
}