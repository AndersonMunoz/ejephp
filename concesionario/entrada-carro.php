<?php
include 'base.php';
include './classes/classCliente.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="css/entrada-carro.css">
    <script src="https://kit.fontawesome.com/33ad4783f4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="super-container">
        <a href="index.html">
            <div class="home"><i class="fa-solid fa-house"></i>&nbsp;Inicio</div>
        </a>
        <div class="main-container">
            <div class="header">
                <div class="entrance">
                    <p>Registrar carro</p>
                </div>
            </div><br>
            <div class="container">
                <div class="logo"><img class="logo-img" src="img/logo.png" alt=""></div>
                <div class="formu">
                    <form method="POST" action="">
                        <legend>
                            <h2>Ingrese la información</h2>
                        </legend>
                        <label><br>Placa del carro</label><br>
                        <input name="placa_car" type="text" maxlength="6" placeholder="Ingrese placa aquí..."><br>
                        <label><br>Color del carro</label><br>
                        <select name="color_car">
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
                            <option>Gris</option>
                        </select><br>
                        <label><br>Seleccione marca del carro</label> <br>
                        <select name="marca_cars">
                            <option>Escoja una opción</option>
                            <option>Chevrolet</option>
                            <option>Toyota</option>
                            <option>Renault</option>
                            <option>Ford</option>
                            <option>Mazda</option>
                            <option>BMW</option>
                            <option>Mercedez</option>
                        </select><br>
                        <label><br>Seleccione identificación</label> <br>
                        <select name="id_cliente">
                            <option>Escoja una opción</option>
                            <?php
                                $documentsWithNames = Cliente::getIdWithNames();

                                foreach ($documentsWithNames as $idCliente => $nombreCliente) {
                                    echo '<option value="' . $idCliente . '">' . $idCliente . ' - ' . $nombreCliente . '</option>';
                                }
                            ?>
                        </select><br><br>
                        <input class="boton1" type="submit" name="btn1" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['btn1'])) {
        $placa = $_POST['placa_car'];
        $color = $_POST['color_car'];
        $marca = $_POST['marca_cars'];
        $idCliente = $_POST['id_cliente'];
        try {
            $sql = "INSERT INTO carros (placa, color, marca, fk_cliente) VALUES (:placam, :colorm, :marcam, :fk_clientem)";
            $resultado = $base->prepare($sql);
            $resultado->execute(array(
                ':placam' => $placa,
                ':colorm' => $color,
                ':marcam' => $marca,
                ':fk_clientem' => $idCliente
            ));
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    };

    ?>
    <script>
        function soloNumeros(e) {
            var key = window.Event ? e.which : e.keyCode
            return (key >= 48 && key <= 57)
        }


        function soloLetras(e) {
            var key = window.Event ? e.which : e.keyCode
            return ((key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 241 || key == 209 || key == 32)
        }
    </script>

</body>

</html>