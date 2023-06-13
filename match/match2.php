<?php

$color=readline("Ingrese color en minúsculas: ");

$mensaje= match($color) {
    "amarillo" => "El color del sol",
    "azul" => "El color del cielo y el mar",
    "rojo" => "El color del diablo",
    "negro" => "El color de la oscuridad",
    default => "Se ingresó un dato erróneo"
};
echo $mensaje;
?>