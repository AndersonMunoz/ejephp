<?php

$letra= readline("Ingrese la letra: ");

$mensaje = match ($letra) {
    "a","e","i","o","u" => "Es una vocal",

    default => "No es una vocal"

};

echo $mensaje;

?>