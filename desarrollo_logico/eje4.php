<?php
$palabra=readline("Ingrese la palabra: ");

if ($palabra==strrev($palabra)){
    echo "$palabra es un palíndromo.";
} else {
    echo "No es un palíndromo";
}
?>