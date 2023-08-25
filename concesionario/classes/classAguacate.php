<?php
include 'base.php';
include('./classes/classCliente.php');
include('./classes/classVehiculo.php');

class Aguacate  {
    public $strHoraEntrada;
    public $strHoraSalida;
    public $piso;
    public $lugar;
    public $pisoDado;
    public $resultadoPiso;
    public $resultadoLugar;

    
    public function __construct(int $piso, int $lugar,string $strHoraEntrada){
        $this -> strHoraSalida= $HoraSalida;
        $this -> piso = [
            'Piso 1' => [],
            'Piso 2' => [],
            'Piso 3' =>[],
            'Piso 4' => []
        ];
    }
    public function setPisoLugar() {
        global $base;
        $idvehiculog = $base->query("SELECT MAX(idCarros) from carros")->fetchColumn();
        
        // Arreglo con los pisos y lugares disponibles
        $pisos = [
            'Piso 1' => [],
            'Piso 2' => [],
            'Piso 3' => [],
            'Piso 4' => []
        ];
        
        $asignacion = asignarLugares($pisos);
        
        if ($asignacion) {
            $pisoAsignado = $asignacion['piso'];
            $lugarAsignado = $asignacion['lugar'];
            
            $query = "INSERT INTO parqueadero (piso, lugar, fk_carro) VALUES (:pisom, :lugarm, :fk_carrom)";
            $resultado2 = $base->prepare($query);
            $resultado2->execute(array(
                ':pisom' => $pisoAsignado,
                ':lugarm' => $lugarAsignado,
                ':fk_carrom' => $idvehiculog
            ));
            
            echo "Lugar asignado exitosamente en Piso $pisoAsignado, Lugar $lugarAsignado.";
        } else {
            echo "No hay lugares disponibles.<br>";
        }
    }
    
    
    
  /*   public function getDatosParqueadero() {
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
    } */
}

?>