<?php

$listNum = readline(prompt:"Ingrese cuantos numeros va a trabajar");

$notas=[];
$suma=0;
for ($i=1;$i<=$listNum;$i++){
    $notas[$i-1]=floatval(readline(prompt:"Ingrese la nota $i: "));
    $suma+= $notas[$i-1];
}
$promedio=$suma/$listNum;

echo("El promedio es $promedio");
echo("La suma de")
?>