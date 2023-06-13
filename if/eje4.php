<?php

$edad = readline("Ingrese su edad: ");

if ($edad<18) {
    echo "No puedes conducir";
} else {
    $pre=readline("¿Tiene licencia de conducir? ingrese 1 para SI o 2 para NO: ");
    if ($pre==1) {
        echo "Puedes conducir";
    } else {
        echo "No puedes conducir";
    }
}
?>