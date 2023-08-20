<?php

require_once("classCliente.php");

class Vehiculo extends Cliente{
    public $strPlaca;
    public $strMarca;
    public $strColor;

    public function __construct(Cliente $persona, string $placa,string $marca, string $color){
        parent::__construct($persona -> strNombre, $persona ->intDocumento);
        $this -> strPlaca = $placa;
        $this -> strMarca = $marca;
        $this -> strColor = $color;
    }
    
    public function getVehiculo() {
        $arrayVehiculo= array(
                            'Placa: ' => $this->strPlaca,
                            'Marca: ' => $this->strMarca,
                            'Color: ' => $this->strColor
        );
        return $arrayVehiculo;
    }   
}
?>