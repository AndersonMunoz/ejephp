<?php
include "base.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar eliminación de usuario</title>
    <link rel="stylesheet" href="css/usuario_eliminar.css">
</head>

<body>
    <div class="table-1">
        <table class="n1">
            <tr>
                <th colspan="2" class="t1">
                    <?php
                    try {
                        $sql = "SELECT * FROM carros WHERE idCarros=" . $_REQUEST['codigo'] . ";";
                        $resultado = $base->prepare($sql);
                        $resultado->execute(array());
                        while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            echo "Esta seguro de eliminar el carro de placas <strong>" . $consulta['placa'];
                    ?>
                </th>
            </tr> 
            <tr>   
                <td class="t2">
                    <a href="buscar.php"><img src="img/mal.png" alt=""><br>Cancelar</a>
                </td>
                <td class="t2">
                    <a href="eliminar-car.php?codigo2=<?php echo $_REQUEST['codigo']; ?>"><img src="img/bien.png" alt=""><br>Confirmar</a>
                </td>
                        </tr>
    <?php
                        }
                    } catch (exception $e) {
                        die('ALERTA DATOS NO ENCONTRADOS' . $e->getMessage());
                    }
    ?>
        </table>
    </div>

</body>

</html>