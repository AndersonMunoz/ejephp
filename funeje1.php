<?php
$ingrepa=readline("Ingrese palabra: ");

function esPalindromo (string $palabra) {
    if ($palabra==strrev($palabra)){
        echo "$palabra es un palíndromo.";
    } else {
        echo "No es un palíndromo";
    }
}

echo esPalindromo($ingrepa);
?>