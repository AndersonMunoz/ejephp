<?php

$num1 = readline("Ingrese primer numero: ");

$mensaje = match($num1) {
    $num1== 1 =>"Hola",
    $num1== 2 =>"Adiós",
    $num1== 3 =>"Lárguese",
    default => "No hay valor alguno"
};

echo $mensaje;

?>