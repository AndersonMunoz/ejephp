<?php
 $num1 = readline("Ingrese primer numero: ");
 $num2 = readline ("Ingrese segundo numero: ");

 if ($num1>10 or $num2>10) {
    if ($num1>10 and $num2>10) {
        echo "Ambos numeros son mayores que 10";
    } else {
        echo "Solo uno de los números es mayor que 10";
    }
 } else if ($num1 <=10  && $num2 <=10) {
    echo "Ninguno de los numeros es mayor que 10";
 }
?>