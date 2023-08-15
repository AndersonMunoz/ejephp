<?php
$n = readline("Ingrese número: ");

function sumaNumero(int $n2) {
    $num = str_split($n2); 
    $largo = count($num); 
    $suma = 0;
    for ($i = 0; $i < $largo; $i++) { 
        $suma = $num[$i] + $suma;
    }
    echo "La suma de ".implode(" + ", $num)." es igual a $suma";
}

sumaNumero($n);

?>
