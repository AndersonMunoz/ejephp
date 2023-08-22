<?php
include 'base.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="css/entrada-user.css">
    <script src="https://kit.fontawesome.com/33ad4783f4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="super-container">
        <a href="index.html"><div class="home"><i class="fa-solid fa-house"></i>&nbsp;Inicio</div></a>
        <div class="main-container">
            <div class="header">
                <div class="entrance"><p>Registro Usuario</p></div>
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
                            <input name="idNum" type="text" id="myInput" onkeypress="return soloNumeros(event)" maxlength="10" placeholder="Ingrese su documento">
                        <label><br>Ingrese su(s) nombre(s) y apellido(s)</label><br>
                            <input name="nombres" type="text" onkeypress="return soloLetras(event)" placeholder="Ingrese su(s) nombre(s) y apellido(s)"><br>
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