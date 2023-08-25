<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link rel="stylesheet" href="css/editar-car.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form method="POST" action="">
            <label for="tipoId">Tipo ID:</label>
            <select name="tipoId">
                <option>Escoja una opción</option>
                <option>Registro Civil</option>
                <option>Tarjeta de Identidad</option>
                <option>Cédula de Ciudadanía</option>
                <option>Cédula de Extranjería</option>
            </select><br>
            <label for="idclientes">Número de identificación:</label>
            <input type="text" id="idclientes" name="idclientes" onkeypress="return soloNumeros(event)" maxlength="10" placeholder="Ingrese su documento"><br>
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre" name="nombre" onkeypress="return soloLetras(event)" placeholder="Ingrese su(s) nombre(s) y apellido(s)"><br>
            <input type="submit" value="Guardar cambios">
            <a class="cancel" href="buscar.php">
                <button class="cancel-button" type="button">Cancelar</button>
            </a>
        </form>
    </div>
</html>
<?php
    include 'base.php';

    // Obtener el ID del cliente de la URL
    if (isset($_GET['codigo'])) {
        $idCliente = $_GET['codigo'];

        // Realizar una consulta para obtener los datos del cliente
        $sql = "SELECT * FROM clientes WHERE idclientes = ?";
        $resultado = $base->prepare($sql);
        $resultado->execute(array($idCliente));
        $cliente = $resultado->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: buscar.php"); // Redirigir si no se proporciona el ID
        exit();
    }

    // Procesar el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos enviados por el formulario
        $nombre = $_POST['nombre'];
        $tipoId = $_POST['tipoId'];
        $nuevoId = $_POST['idclientes'];

        // Actualizar los datos del cliente en la base de datos
        $sql = "UPDATE clientes SET idclientes = ?, nombre = ?, tipoId = ? WHERE idclientes = ?";
        $resultado = $base->prepare($sql);
        $resultado->execute(array($nuevoId, $nombre, $tipoId, $idCliente));

        header("Location: buscar.php"); // Redirigir de vuelta al listado
        exit();
    }
?> 

<script>
        function soloNumeros(e){
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }
           

        function soloLetras(e) {
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 241 || key == 209 || key == 32)
        }
    </script>
