<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar carro</title>
    <link rel="stylesheet" href="css/editar-car.css">
</head>
<body>
<div class="container">
        <h1>Editar Carro</h1>
        <form method="POST" action="">
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" value=""><br>
            <label for="marca">Marca:</label>
            <select name="marca">
                            <option>Escoja una opción</option>
                            <option>Chevrolet</option>
                            <option>Toyota</option>
                            <option>Renault</option>
                            <option>Ford</option>
                            <option>Mazda</option>
                            <option>BMW</option>
                            <option>Mercedez</option>
                        </select><br>
            <label for="color">Color:</label>
            <select name="color">
                            <option>Escoja una opción</option>
                            <option>Azul</option>
                            <option>Rojo</option>
                            <option>Verde</option>
                            <option>Amarillo</option>
                            <option>Naranja</option>
                            <option>Morado</option>
                            <option>Rosa</option>
                            <option>Negro</option>
                            <option>Blanco</option>
                            <option>Gris</option><br><br>
            <input type="submit" value="Guardar cambios">
            <a class="cancel" href="buscar.php">
                <button class="cancel-button" type="button">Cancelar</button>
            </a>
        </form>
    </div>
</body>
</html>
<?php
    include 'base.php';

    // Obtener el ID del carro de la URL
    if (isset($_GET['codigo'])) {
        $idCarro = $_GET['codigo'];

        // Realizar una consulta para obtener los datos del carro
        $sql = "SELECT * FROM carros JOIN clientes ON fk_cliente = idclientes WHERE idCarros = ?";
        $resultado = $base->prepare($sql);
        $resultado->execute(array($idCarro));
        $carro = $resultado->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: buscar.php"); // Redirigir si no se proporciona el ID
        exit();
    }

    // Procesar el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos enviados por el formulario
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $color = $_POST['color'];

        // Actualizar los datos del carro en la base de datos
        $sql = "UPDATE carros SET placa = ?, marca = ?, color = ? WHERE idCarros = ?";
        $resultado = $base->prepare($sql);
        $resultado->execute(array($placa, $marca, $color, $idCarro));

        header("Location: buscar.php"); // Redirigir de vuelta al listado
        exit();
    }
?>
