<?php

$num = readline("Ingrese un número: ");

$mensaje = match ($num) {
    '1' => "Opción 1. Por favor haga una suma",
    '2' => "Opción 2. Por favor haga una resta",
    '3' => "Opción 3. Por favor haga una multiplicación" ,
    '4' => "Opción 4. Por favor haga una división",
    '5' => "Opción 5. Por favor haga un promedio " ,
    default => "ERROR Solo números del 1 al 5"

};

echo $mensaje;

?> 

