<?php

$nota = readline ("Ingrese nota: ");

$mensaje =match (true) {
    $nota >= 80 && $nota < 101 => "Excelente",
    $nota >= 60 && $nota < 80 => "Bien",
    $nota >= 40 && $nota < 60 => "Regular",
    $nota >= 0 && $nota < 40 => "Mal",
    default => "Ingrese valores válidos"
};

echo $mensaje;
?>