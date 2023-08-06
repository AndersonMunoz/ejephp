<?php

require_once("classCliente.php");
require_once("classVehiculo.php");
require_once("classAguacate.php");

$objCliente= new Cliente ("Camilo",1048);
$objVehiculo = new Vehiculo ($objCliente,"KLX 531","Chverolet","Verde");
$objAguacate = new Aguacate ($objCliente, $objVehiculo,"20:00:00","20:08:00");

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



$objCliente2= new Cliente ("Maria",2569);
$objVehiculo2 = new Vehiculo ($objCliente2,"JKU 475","Renault","Azul");
$objAguacate2 = new Aguacate ($objCliente2, $objVehiculo2,"09:59:59","14:00:00");
$vehiculo2 = $objVehiculo2->getVehiculo();


foreach ($vehiculo2 as $key2 => $value2) {
    echo $key2 . " " . $value2 . "<br>";
}

$aguacate2 = $objAguacate2 ->getDatosParqueadero();
foreach ($aguacate2 as $key4 => $value4) {
    echo $key4 . " " . $value4 . "<br>";
};
echo "<br>";
echo "<br>";
?>