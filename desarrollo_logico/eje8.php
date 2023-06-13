<?php
$n1 = readline("Ingrese número inicial del rango: ");
$n2 = readline("Ingrese número final del rango: ");

echo "Números perfectos encontrados: ";

for ($i = $n1; $i <= $n2; $i++) {
    $divisores = 0;
    
    for ($j = 1; $j <= ($i / 2); $j++) {
        if ($i % $j == 0) {
            $divisores = $divisores +$j;
        }
    }
    
    if ($divisores == $i) {
        echo $i . " ";
    }
}

?>
