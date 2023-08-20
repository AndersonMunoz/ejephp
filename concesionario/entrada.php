<?php
include 'base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="css/entrada.css">
    <script src="https://kit.fontawesome.com/33ad4783f4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="super-container">
        <a href="index.html"><div class="home"><i class="fa-solid fa-house"></i>&nbsp;Inicio</div></a>
        <div class="main-container">
            <div class="header">
                <div class="entrance"><p>Entrada</p></div>
            </div><br>
            <div class="container">
                <div class="logo"><img class="logo-img" src="img/logo.png" alt=""></div>
                <div class="formu">
                    <form method="POST" action="">
                        <legend><h2>Ingrese la información</h2></legend> 
                        <label><br>Ingrese su tipo de documento</label><br>
                            <select name="idTipo">
                                <option>Escoja una opción</option>
                                <option>Registro Civil</option>
                                <option>Tarjeta de Indentidad</option>
                                <option>Cédula de Ciudadanía</option>
                                <option>Cédula de Extranjería</option>
                            </select><br>
                        <label><br>Ingrese su número de documento</label><br>
                            <input name="idNum" type="text" id="myInput" onkeypress="return soloNumeros(event)" maxlength="10" placeholder="Ingrese su documento"><br>
                        <label><br>Ingrese su(s) nombre(s) y apellido(s)</label><br>
                            <input name="nombres" type="text" onkeypress="return soloLetras(event)" placeholder="Ingrese su(s) nombre(s) y apellido(s)"><br>
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
                            </select><br><br>
                            <input class="boton1" type="submit" name="btn1" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
         if (isset($_POST['btn1'])) {
            $name=$_POST['nombres'];
            $tipoId=$_POST['idTipo'];
            $id=$_POST['idNum'];
            try {
                $sql="INSERT INTO `clientes`(`nombre`, `tipoId`, `idclientes`) VALUES (:nomg,:tipoidm,:idclim)";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":nomg"=>$name,":tipoidm"=>$tipoId,":idclim"=>$id));
        
                $idCliente = $base->lastInsertId();
        

            } catch (Exception $e) {
                die('Error: '.$e->getMessage());
            }
         };

        if (isset($_POST['btn1'])) {
            $placa = $_POST['placa_car'];
            $color = $_POST['color_car'];
            $marca = $_POST['marca_cars'];
            $fk_cliente = $_POST['idNum'];
            try {
                $sql = "INSERT INTO carros (placa, color, marca, fk_cliente) VALUES (:placam, :colorm, :marcam, :fk_clientem)";
                $resultado = $base->prepare($sql);
                $resultado->execute(array(
                    ':placam' => $placa,
                    ':colorm' => $color,
                    ':marcam' => $marca,
                    ':fk_clientem' => $fk_cliente
                ));
            }   catch(Exception $e) {
                die('Error: '.$e->getMessage());
            }
         };
         
         if (isset($_POST['btn1'])) {
            require_once 'base.php';
            $idCarro = $base->lastInsertId();
            $hora_entrada = date("Y-m-d H:i:s");
            $fk_carro = $idCarro;  // Usa el ID del carro aquí
            $aguacate = new Aguacate($persona, $carro, $hora_entrada, ''); // Deja la hora_salida vacía por ahora
            $aguacate->setPisoLugar();
            $piso = $aguacate->resultadoPiso;
            $lugar = $aguacate->resultadoLugar;
            
            
            try {
                $sql = "INSERT INTO parqueadero (piso, lugar, hora_entrada, fk_carro) VALUES (:pisom, :lugarm, :hora_entradam, :fk_carrom)";
                $resultado = $base->prepare($sql);
                $resultado->execute(array(
                    ':pisom' => $piso,
                    ':lugarm' => $lugar,
                    ':hora_entradam' => $hora_entrada,
                    ':fk_carrom' => $fk_carro
                ));
            } catch(Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        

        /*  include 'base.php';
        include './classes/classCliente.php';
        include './classes/classVehiculo.php';
        include './classes/classAguacate.php';
        
        if (isset($_POST['btn1'])) {
            $name = $_POST['nombres'];
            $tipoId = $_POST['idTipo'];
            $id = $_POST['idNum'];
            $placa = $_POST['placa_car'];
            $color = $_POST['color_car'];
            $marca = $_POST['marca_cars'];
        
            $base = obtenerConexion(); // Obtener la conexión a la base de datos
        
            try {
                // Crear instancia de Cliente
                $cliente = new Cliente($name, $id);
        
                // Crear instancia de Vehiculo
                $vehiculo = new Vehiculo($cliente, $placa, $marca, $color);
        
                // Crear instancia de Aguacate con la hora de entrada actual
                $horaEntrada = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual
                $aguacate = new Aguacate($cliente, $vehiculo, $horaEntrada, '');
        
                // Insertar datos en la base de datos
                $sqlCliente = "INSERT INTO clientes (nombre, tipoId, idclientes) VALUES (:nomg,:tipoidm,:idclim)";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":nomg"=>$name,":tipoidm"=>$tipoId,":idclim"=>$id));
        
                $idCliente = $base->lastInsertId();
        
                $sqlVehiculo = "INSERT INTO carros (placa, color, marca, fk_cliente) VALUES (:placam,:colorm,:marcam,:idcliem)";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":placam"=>$placa,":colorm"=>$color,":marcam"=>$marca,":idcliem"=>$id));
        
                echo "Datos ingresados correctamente.";
        
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } */
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
    
</body>
</html> 