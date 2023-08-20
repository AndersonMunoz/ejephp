<?php

require_once("classCliente.php");
require_once("classVehiculo.php");

class Aguacate extends Vehiculo {
    public $strHoraEntrada;
    public $strHoraSalida;
    public $piso;
    public $lugar;
    public $pisoDado;
    public $resultadoPiso;
    public $resultadoLugar;

    
    public function __construct(Cliente $persona, Vehiculo $carro, string $HoraEntrada, string $HoraSalida){
        parent::__construct($persona, $carro->strPlaca,$carro->strMarca,$carro->strColor);
        $this -> strHoraEntrada =$HoraEntrada;
        $this -> strHoraSalida= $HoraSalida;
        $this -> piso = [
            'Piso 1' => [],
            'Piso 2' => [],
            'Piso 3' =>[],
            'Piso 4' => []
        ];
    }
    public function setPisoLugar() {
        for ($piso = 1; $piso <= 4; $piso++) {
            for ($lugar = 0; $lugar < 10; $lugar++) {
                if (!isset($this->piso["Piso $piso"][$lugar])) {
                    $this->piso["Piso $piso"][$lugar] = true;
                    $this->pisoDado = $piso;
                    $this->lugar = $lugar + 1;

                    // Almacenar resultados en propiedades
                    $this->resultadoPiso = $this->pisoDado;
                    $this->resultadoLugar = $this->lugar;
                    return;
                }
            }
        }
        echo "No hay lugares disponibles.<br>";
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