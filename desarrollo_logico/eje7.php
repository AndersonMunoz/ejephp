<?php
$lista = [];
$entrada = readline("Ingrese los elementos de la lista (separados por comas): ");
$elementos = explode(',', $entrada);

foreach ($elementos as $elemento) {
    $lista[] = trim($elemento);
}

$elementoBuscado = readline("Ingrese el elemento que desea buscar: ");

buscarElemento($lista, $elementoBuscado);

function buscarElemento($lista, $elemento) {
    $posicion = array_search($elemento, $lista);
    
    if ($posicion !== false) {
        echo "El elemento '$elemento' se encuentra en la posición $posicion de la lista.";
    } else {
        echo "El elemento '$elemento' no se encontró en la lista.";
    }
}

?>
