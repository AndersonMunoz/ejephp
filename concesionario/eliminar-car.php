<?php
include "base.php";

try {
    $sql = "DELETE FROM carros WHERE idCarros=" . $_REQUEST['codigo2'] . ";";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());
?>
    <script type="text/javascript">
        window.alert('El carro será eliminado del sistema');
        window.location = "buscar.php"
    </script>
<?php
} catch (exception $e) {
    die('No se encontró ningún dato a eliminar' . $e->getMessage());
}
?>