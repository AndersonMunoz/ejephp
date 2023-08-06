<?php

class Cliente {
    protected $strNombre;
    protected $intDocumento;

    function __construct(string $nombre, int $documento) {
        $this -> strNombre = $nombre;
        $this -> intDocumento = $documento;
    }

    public function getDatosPersonales() {
        echo "Nombre: ".$this->strNombre."<br>";
        echo "Documento: ".$this->intDocumento."<br><br>";
    }
}

?>