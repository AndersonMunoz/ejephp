<?php
    include 'base.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Usuario</title>
    <link rel="stylesheet" href="css/consulta.css">
    <script src="https://kit.fontawesome.com/33ad4783f4.js" crossorigin="anonymous"></script>
</head>
<body>
        <a href="index.html">
            <div class="home"><i class="fa-solid fa-house"></i>&nbsp;Inicio</div>
        </a>
    <div class="super-container">
    <div class="mainn">
        <form>
        <table>
            <tr>
                <td class=titulo colspan="8"><h1>Listado de clientes</h1></td>
            </tr>
            <tr>
                <td class="titulo3"><h2>Tipo ID</h2></td>
                <td class="titulo3"><h2>ID</h2></td>
                <td class="titulo3"><h2>Nombres</h2></td>
                <td class="titulo3"><h2>Editar</h2></td>
                <td class="titulo3"><h2>Eliminar</h2></td>
            </tr>
            <tr>
                <?php
                    try {$sql="SELECT * FROM  clientes";
                        $resultado=$base->prepare($sql);
                        $resultado->execute(array());
                        while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td class="titulo2"><?php echo $consulta ['tipoId']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['idclientes']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['nombre']; ?></td>
                                <td class="titulo2 edit"><a class="edit" href="editar_user.php?codigo=<?php echo $consulta['idclientes']?>"><i class="fa-solid fa-user-pen"></i></a></td>
                                <td class="titulo2"><a class="delete" href="confirmar-eliminar-user.php?codigo=<?php echo $consulta['idclientes']?>"><i class="fa-solid fa-user-slash"></i></a></td>
                            </tr>
                            <?php
                        }
                    } catch (Exception $e) {
                        die('Alerta - Se produjo un error al intentar conectarse con la base de datos');
                    }
                ?>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td class=titulo colspan="8"><h1>Listado de carros parqueados con dueño</h1></td>
            </tr>
            <tr>
                <td class="titulo3"><h2>Tipo ID</h2></td>
                <td class="titulo3"><h2>ID</h2></td>
                <td class="titulo3"><h2>Propietario</h2></td>
                <td class="titulo3"><h2>Placa</h2></td>
                <td class="titulo3"><h2>Marca</h2></td>
                <td class="titulo3"><h2>Color</h2></td>
                <td class="titulo3"><h2>Editar</h2></td>
                <td class="titulo3"><h2>Eliminar</h2></td>
            </tr>
            <tr>
                <?php
                    try {$sql="SELECT * FROM  carros JOIN clientes ON fk_cliente = idclientes";
                        $resultado=$base->prepare($sql);
                        $resultado->execute(array());
                        while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td class="titulo2"><?php echo $consulta ['tipoId']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['idclientes']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['nombre']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['placa']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['marca']; ?></td>
                                <td class="titulo2"><?php echo $consulta ['color']; ?></td>
                                <td class="titulo2 edit"><a class="edit" href="editar_car.php?codigo=<?php echo $consulta['idCarros']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="titulo2 delete"><a class="delete" href="confirmar-eliminar-car.php?codigo=<?php echo $consulta['idCarros']?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                
                            </tr>
                            <?php
                        }
                    } catch (Exception $e) {
                        die('Alerta - Se produjo un error al intentar conectarse con la base de datos');
                    }
                ?>
            </tr>
        </table>

        </form>
    </div>
    </div>
    
</body>
</html>