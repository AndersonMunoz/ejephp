<?php
include 'base.php';

$carroEncontrado = null;

if (isset($_POST['placa'])) {
    $placa = $_POST['placa'];

    $sql = "SELECT * FROM carros JOIN clientes ON fk_cliente = idclientes WHERE placa = ?";
    $resultado = $base->prepare($sql);
    $resultado->execute(array($placa));

    $carroEncontrado = $resultado->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salida</title>
    <link rel="stylesheet" href="css/salida.css">
    <script src="https://kit.fontawesome.com/33ad4783f4.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="index.html">
        <div class="home"><i class="fa-solid fa-house"></i>&nbsp;Inicio</div>
    </a>
    <div class="super-container">
    <div class="container">
        <div class="logo"><img class="logo-img" src="img/logo.png" alt=""></div>
        <div class="formu">
            <div class="seeker">
                <form method="POST" action="">
                    <label><h2>Buscar carro</h2></label><br>
                    <input type="text" name="placa" maxlength="6" placeholder="Ingrese placa aquí...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <?php if ($carroEncontrado !== null): ?>
    <div class="results">
        <?php 
        $sql = "SELECT * FROM carros JOIN clientes ON fk_cliente = idclientes";
        $resultado = $base->prepare($sql);
        $resultado->execute(array());
        if ($carroEncontrado): ?>
            
            <table class="exit">
                <tr>
                    <td class="titulo3"><h2>Tipo ID</h2></td>
                    <td class="titulo3"><h2>ID</h2></td>
                    <td class="titulo3"><h2>Propietario</h2></td>
                    <td class="titulo3"><h2>Placa</h2></td>
                    <td class="titulo3"><h2>Marca</h2></td>
                    <td class="titulo3"><h2>Color</h2></td>
                    <td class="titulo3"><h2>Salir</h2></td>
                </tr>
                <tr>
                    <td class="titulo2"><?php echo $carroEncontrado['tipoId']; ?></td>
                    <td class="titulo2"><?php echo $carroEncontrado['idclientes']; ?></td>
                    <td class="titulo2"><?php echo $carroEncontrado['nombre']; ?></td>
                    <td class="titulo2"><?php echo $carroEncontrado['placa']; ?></td>
                    <td class="titulo2"><?php echo $carroEncontrado['marca']; ?></td>
                    <td class="titulo2"><?php echo $carroEncontrado['color']; ?></td>
                    <td class="titulo2 delete">
                        <a class="delete" href="confirmar-eliminar-car-salida.php?codigo=<?php echo $carroEncontrado['idCarros']?>"><i class="fa-solid fa-door-open"></i></a>
                    </td>
                </tr>
            </table>
            
        <?php else: ?>
            <p>Carro no encontrado</p>
        <?php endif; ?>
    </div>
<?php endif; ?>
        </div>
        
    </div>
    </div>
    

    

</body>
</html>

</body>
</html> 