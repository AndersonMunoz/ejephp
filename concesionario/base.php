<?php

    try {
        $base = new PDO('mysql:host=localhost; dbname=aguacate', 'root', '');
        return $base;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }

?>