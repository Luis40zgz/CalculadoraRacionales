<?php

class Racional
{
    private int $numerador;
    private int $denominador;

    const ERROR = false;
    const RACIONAL = true;
    public function validar($entrada){
        $patron = "#^[0-9]+/[1-9][0-9]*$#";
        if(preg_match($patron, $entrada)){
            return Racional::RACIONAL;
        }else {
            return Racional::ERROR;
        }
    } 
    public function __contruct( $entrada){
        if()


}
}