<?php
$n = readline("Ingrese límite de la secuencia Fibonacci: ");
$secuencia = [];
for ($i = 0; $i <= $n; $i++) {
    if ($i <= 1) {
        $secuencia[$i] = $i;
    } else {
        $secuencia[$i] = $secuencia[$i - 1] + $secuencia[$i - 2];
    }
    echo $secuencia[$i] . " ";
}


?>