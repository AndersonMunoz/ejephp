<?php

$hora = readline("Ingrese hora: ");
$minuto = readline ("Ingrese minutos: ");

$mensaje = match (true) {
    $hora <=11 && $hora>=0 && $minuto>=0 && $minuto<61 => "Las $hora : $minuto pertenece al horario de la mañana",
    $hora >=12 && $hora<19 && $minuto>=0 && $minuto<61 => "Las $hora:$minuto pertenece al horario de la tarde",
    $hora >=19 && $hora<24 && $minuto>=0 && $minuto<61 => "Las $hora:$minuto pertenece al horario de la noche",
    default => "ERROR, ingrese datos correctos"
};
echo $mensaje;

?>