<?php
$dia = readline("Ingrese un número del 1 al 7: ");


if ($dia <0 && $dia>8) {
    echo "Error, por favor ingrese un número válido";
} else {
    if ($dia==1) {
        echo "Lunes";
    } else if ($dia==2) {
        echo "Martes";
    } else if ($dia==3) {
        echo "Miercoles";
    } else if ($dia==4) {
        echo "Jueves";
    } else if ($dia==5) {
        echo "Viernes";
    } else if ($dia==6) {
        echo "Saabado";
    }else if ($dia==7) {
        echo "Domingo";
    }
}

?>