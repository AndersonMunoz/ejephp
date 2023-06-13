<?php

$dia= readline("Ingrese día: ");

$mensaje =match ($dia) {
    "1" => "Lunes",
    "2" => "Martes",
    "3" => "Miécoles",
    "4" => "Jueves",
    "5" => "Viernes",
    "6" => "Sábado",
    "7" => "Domingo",
    default => "No hay un día la semana menor 1 o mayor a a 7"
};

echo $mensaje;
?>