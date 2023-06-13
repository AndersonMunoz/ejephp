<?php

$texto=strlen(readline("Ingrese un texto: "));

$mensaje = match ($texto) {
    $texto>=10 => "La cadena es larga",
    default => "Su cadena de texto tiene $texto caracteres"
};

echo $mensaje;

?>