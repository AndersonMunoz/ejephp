<?php
$p2 = readline("¿Cuantos números vas a ingresar?: ");
function ordernarArray(int $p) {
    $arreglo = [];

    for ($i = 0; $i < $p; $i++) {
        $n = readline("Ingrese el número en la posición $i: ");
        $arreglo[$i] = $n;
    }

    for ($i = 0; $i < $p - 1; $i++) {
        for ($j = 0; $j < $p - $i - 1; $j++) {
            if ($arreglo[$j] > $arreglo[$j + 1]) {
                $cambiar = $arreglo[$j];
                $arreglo[$j] = $arreglo[$j + 1];
                $arreglo[$j + 1] = $cambiar;
            }
        }
    }
    print_r($arreglo);

}
echo ordernarArray($p2);
?>