<?php

// Función para repartir 5 cartas aleatorias del mazo
function repartirCartas() {
    $mazo = [
        "As de Corazones", "2 de Corazones", "3 de Corazones", "4 de Corazones", "5 de Corazones",
        "6 de Corazones", "7 de Corazones", "8 de Corazones", "9 de Corazones", "10 de Corazones",
        "Jota de Corazones", "Reina de Corazones", "Rey de Corazones", "As de Picas", "2 de Picas",
        "3 de Picas", "4 de Picas", "5 de Picas", "6 de Picas", "7 de Picas", "8 de Picas",
        "9 de Picas", "10 de Picas", "Jota de Picas", "Reina de Picas", "Rey de Picas",
        "As de Diamantes", "2 de Diamantes", "3 de Diamantes", "4 de Diamantes", "5 de Diamantes",
        "6 de Diamantes", "7 de Diamantes", "8 de Diamantes", "9 de Diamantes", "10 de Diamantes",
        "Jota de Diamantes", "Reina de Diamantes", "Rey de Diamantes", "As de Tréboles", "2 de Tréboles",
        "3 de Tréboles", "4 de Tréboles", "5 de Tréboles", "6 de Tréboles", "7 de Tréboles",
        "8 de Tréboles", "9 de Tréboles", "10 de Tréboles", "Jota de Tréboles", "Reina de Tréboles",
        "Rey de Tréboles"
    ];

    $cartasRepartidas = [];
    $cartasIndices = array_rand($mazo, 5);
    
    foreach ($cartasIndices as $indice) {
        $cartasRepartidas[] = $mazo[$indice];
    }
    
    return $cartasRepartidas;
}

// Función para mostrar las cartas repartidas
function mostrarCartas($cartas) {
    foreach ($cartas as $carta) {
        echo $carta . "\n";
    }
}

// Función para evaluar la mejor combinación de cartas
// Función para evaluar la mejor combinación de cartas
function evaluarMano($cartas) {
    // Verificar combinaciones de mayor a menor valor
    
    // Escalera real (A, K, Q, J, 10 del mismo palo)
    $escaleraReal = ["As de Corazones", "Rey de Corazones", "Reina de Corazones", "Jota de Corazones", "10 de Corazones"];
    sort($cartas);
    if ($cartas === $escaleraReal) {
        echo "Tienes una escalera real.";
        return;
    }
    
    // Escalera de color
    $escaleraColor = false;
    if (esEscalera($cartas) && mismoPalo($cartas)) {
        $escaleraColor = true;
        echo "Tienes una escalera de color.";
        return;
    }
    
    // Póker (4 cartas del mismo valor)
    $poker = false;
    $valores = obtenerValores($cartas);
    foreach ($valores as $valor => $cantidad) {
        if ($cantidad === 4) {
            $poker = true;
            echo "Tienes un póker.";
            return;
        }
    }
    
    // Full house (3 cartas del mismo valor y 2 cartas del mismo valor)
    $fullHouse = false;
    $trio = false;
    $par = false;
    foreach ($valores as $valor => $cantidad) {
        if ($cantidad === 3) {
            $trio = true;
        } elseif ($cantidad === 2) {
            $par = true;
        }
    }
    if ($trio && $par) {
        $fullHouse = true;
        echo "Tienes un full house.\n";
        return;
    }
    
    // Color (5 cartas del mismo palo)
    $color = false;
    if (mismoPalo($cartas)) {
        $color = true;
        echo "Tienes un color.\n";
        return;
    }
    
    // Escalera (5 cartas consecutivas de palos diferentes)
    $escalera = false;
    if (esEscalera($cartas)) {
        $escalera = true;
        echo "Tienes una escalera.\n";
        return;
    }
    
    // Trío (3 cartas del mismo valor)
    if ($trio) {
        echo "Tienes un trío.\n";
        return;
    }
    
    // Dos pares
    $pares = 0;
    foreach ($valores as $valor => $cantidad) {
        if ($cantidad === 2) {
            $pares++;
        }
    }
    if ($pares === 2) {
        echo "Tienes dos pares.\n";
        return;
    }
    
    // Par
    if ($par) {
        echo "Tienes un par. \n";
        return;
    }
    
    // Carta alta
    echo "No tienes ninguna combinación especial. \n Tu mejor carta es: " . $cartas[4];
}

// Función para verificar si las cartas forman una escalera
function esEscalera($cartas) {
    $valores = obtenerValores($cartas);
    $min = min($valores);
    $max = max($valores);
    return ($max - $min === 4 && count($valores) === 5);
}

// Función para verificar si todas las cartas son del mismo palo
function mismoPalo($cartas) {
    $palo = obtenerPalo($cartas[0]);
    foreach ($cartas as $carta) {
        if (obtenerPalo($carta) !== $palo) {
            return false;
        }
    }
    return true;
}

// Función para obtener los valores numéricos de las cartas
function obtenerValores($cartas) {
    $valores = [];
    foreach ($cartas as $carta) {
        $valor = obtenerValorNumerico($carta);
        if (isset($valores[$valor])) {
            $valores[$valor]++;
        } else {
            $valores[$valor] = 1;
        }
    }
    return $valores;
}

// Función para obtener el palo de una carta
function obtenerPalo($carta) {
    $partes = explode(" ", $carta);
    return $partes[2];
}

// Función para obtener el valor numérico de una carta
function obtenerValorNumerico($carta) {
    $partes = explode(" ", $carta);
    $valor = $partes[0];
    switch ($valor) {
        case "As":
            return 14;
        case "Rey":
            return 13;
        case "Reina":
            return 12;
        case "Jota":
            return 11;
        default:
            return intval($valor);
    }
}
$cartas = repartirCartas();
mostrarCartas($cartas);
evaluarMano($cartas);
?>
