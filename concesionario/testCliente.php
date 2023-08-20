<?php

require_once("./classes/classCliente.php");
require_once("./classes/classVehiculo.php");
require_once("./classes/classAguacate.php");
include 'base.php';
$fechaHoraActual = new DateTime();
$fechaHoraActual = $fechaHoraActual->format('Y-m-d H:i:s');

$objCliente= new Cliente ("Camilo",1048);
$objVehiculo = new Vehiculo ($objCliente,"KLX 531","Chverolet","Verde");
$objAguacate = new Aguacate ($objCliente, $objVehiculo,$fechaHoraActual,"20:08:00");

$vehiculo = $objVehiculo->getVehiculo();
foreach ($vehiculo as $key => $value) {
    echo $key . " " . $value . "<br>";
}
$aguacate = $objAguacate ->getDatosParqueadero();
foreach ($aguacate as $key3 => $value3) {
    echo $key3 . " " . $value3 . "<br>";
};

echo "<br>";
echo "<br>";



?>