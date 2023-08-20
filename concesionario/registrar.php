<?php
require_once("classCliente.php");
require_once("classVehiculo.php");
require_once("classAguacate.php");
require_once("base.php");

if(isset($_POST["btn1"])) {
    // Recoge los datos del formulario
    $tipoDocumento = $_POST["idTipo"];
    $numeroDocumento = $_POST["idNum"];
    $nombreCliente = $_POST["nombres"];
    $placaVehiculo = $_POST["placa_car"];
    $colorVehiculo = $_POST["color_car"];
    $marcaVehiculo = $_POST["marca_cars"];

    // Captura la fecha y hora actual en formato datetime
    $horaEntrada = date("Y-m-d H:i:s");

    // Crea una instancia de Cliente
    $cliente = new Cliente($nombreCliente, $numeroDocumento);

    // Crea una instancia de Vehiculo utilizando la instancia de Cliente
    $vehiculo = new Vehiculo($cliente, $placaVehiculo, $marcaVehiculo, $colorVehiculo);

    // Crea una instancia de Aguacate con hora de entrada y hora de salida vacía
    $aguacate = new Aguacate($cliente, $vehiculo, $horaEntrada, "");

    // Guarda los datos en la base de datos
    $db = new Database();
    $db->guardarDatos($cliente, $vehiculo, $aguacate);

    echo "Datos registrados exitosamente.";
}
?>
