<?php
$n = readline("Ingrese límite de la secuencia Fibonacci: ");
function generarFibonacci (int $nu) {
    $secuencia = [];
    for ($i = 0; $i <= $nu; $i++) {
        if ($i <= 1) {
            $secuencia[$i] = $i;
        } else {
            $secuencia[$i] = $secuencia[$i - 1] + $secuencia[$i - 2];
        }
        echo $secuencia[$i] . " ";
    }
}

echo generarFibonacci($n);

?>