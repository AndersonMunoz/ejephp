<?php
$num=floatval(readline("Ingrese el número a saber el factorial: "));
$mul=1;
for ($i=1;$i<=$num;$i++) {
    $mul=$mul*$i;
}
echo "El factorial de $num es $mul";
?>