<?php

$dia = readline("Ingrese día en números: ");
$mes = readline("Ingrese mes en número: ");
$ano = readline("Ingrese año: ");

$mensaje = match ($mes) {
    "1" => "El mes de la fecha $dia/$mes/$ano se celebra el carnaval de blancos y negros",
    "2" => "El mes de la fecha $dia/$mes/$ano se celebra el día de San Valentín",
    "3" => "El mes de la fecha $dia/$mes/$ano se celebra el día de la mujer",
    "4" => "El mes de la fecha $dia/$mes/$ano se celebra el semana santa",
    "5" => "El mes de la fecha $dia/$mes/$ano se celebra el día del trabajador",
    "6" => "El mes de la fecha $dia/$mes/$ano se celebra San Pedro",
    "7" => "El mes de la fecha $dia/$mes/$ano se celebra el día de la independencia",
    "8" => "El mes de la fecha $dia/$mes/$ano se celebra la batalla de Boyacá",
    "9" => "El mes de la fecha $dia/$mes/$ano se celebra el mes del amor y la amistad",
    "10" => "El mes de la fecha $dia/$mes/$ano se celebra el mes de las brujas",
    "11" => "El mes de la fecha $dia/$mes/$ano se celebra el mes del pre-Diciembre",
    "12" => "El mes de la fecha $dia/$mes/$ano se celebra navidad"
};

echo $mensaje;


?>