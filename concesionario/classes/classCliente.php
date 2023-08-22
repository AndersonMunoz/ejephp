<?php

include './base.php';

class Cliente {
    public $strNombre;
    public $intDocumento;

    function __construct(string $nombre=null, int $documento=null) {
        $this -> strNombre = $nombre;
        $this -> intDocumento = $documento;
    }

    public function getDatosPersonales() {
        echo "Nombre: ".$this->strNombre."<br>";
        echo "Documento: ".$this->intDocumento."<br><br>";
    }

    public function getId(){
        global $base;

        $documentsArray = [];
        $nameArray = [];

        $sql="SELECT * FROM clientes";
        $resultado=$base->prepare($sql);
        $resultado->execute(array());

        while($document = $resultado->fetch(PDO::FETCH_ASSOC)){
            $documentsArray[] = $document["idclientes"];
            // $nameArray[] = $document['nombre'];
        }
        // $document = $resultado->fetch(PDO::FETCH_ASSOC);
        return $documentsArray;
    }
}

?>