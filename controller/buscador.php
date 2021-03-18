<?php

class Buscador {

    public $fechaInicio;
    public $fechaFinal;
    public $cantidadMl;

    public function __CONSTRUCT() {
        $this->fechaInicio = date('Y-m-d');
        $this->fechaFinal = date('Y-m-d');;
        $this->cantidadMl = 0;
    }

}
