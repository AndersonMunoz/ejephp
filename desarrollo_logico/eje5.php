<?php
$n = floatval(readline("Ingrese el número: "));

function esPrimo($numero)
{
    if ($numero < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }

    return true;
}

if (esPrimo($n)) {
    echo "$n es un número primo";
} else {
    echo "$n NO es un número primo";
}
?>
