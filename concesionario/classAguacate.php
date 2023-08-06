<?php

require_once("classCliente.php");
require_once("classVehiculo.php");

class Aguacate extends Vehiculo {
    public $strHoraEntrada;
    public $strHoraSalida;
    public $piso;
    public $lugar;
    public $pisoDado;

    public function __construct(Cliente $persona, Vehiculo $carro, string $HoraEntrada, string $HoraSalida){
        parent::__construct($persona, $carro->strPlaca,$carro->strMarca,$carro->strColor);
        $this -> strHoraEntrada =$HoraEntrada;
        $this -> strHoraSalida= $HoraSalida;
        $this -> piso = [
            'Piso 1: ' => [],
            'Piso 2' => [],
            'Piso 3' =>[],
            'Piso 4' => []
        ];
    }
    public function setPisoLugar() {
        $pisoDado = rand(1, 4);
        $lugar = rand(1, 10);
        do {
            $pisoDado = rand(1, 4);
            $lugar = rand(1, 10);
        } while (isset($this->piso[$pisoDado][$lugar]));
        $this->piso[$pisoDado][$lugar] = true;
        $this->pisoDado = $pisoDado;
        $this->lugar = $lugar;
        echo "Su piso es: " . $this->pisoDado . "<br>";
        echo "Su lugar es: " . $this->lugar . "<br>";
    }

    public function getDatosParqueadero() {
        $datosPersonas = $this->getDatosPersonales();
        $HorasEstacionado = ceil((strtotime($this->strHoraSalida) - strtotime($this->strHoraEntrada)) / 3600);
        $costo = 2000;
        $totalPago = $HorasEstacionado * $costo;
        $datosVehiculo = $this->getVehiculo();
        
        $arrayAguacate = array(
            'Hora de entrada: ' => $this->strHoraEntrada,
            'Hora de Salida: ' => $this->strHoraSalida,
        );
        echo "Se estacionó " . $HorasEstacionado . " hora(s), por lo que debe pagar <b>" . $totalPago."$</b><br>Costo por hora = 2000$ <br>";
        $this->setPisoLugar();

        return $arrayAguacate;
    }
}

?>