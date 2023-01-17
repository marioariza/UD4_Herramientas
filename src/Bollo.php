<?php 

include_once 'Dulces.php';

class Bollo extends Dulces {
    private string $relleno;

    public function __construct($nombre, $numero, $precio, $relleno)
    {
        parent::__construct($nombre, $numero, $precio);  
        $this->relleno = $relleno;
    }


    public function getRelleno()
    {
        return $this->relleno;
    }

    public function setRelleno($relleno)
    {
        $this->relleno = $relleno;

        return $this;
    }

    public function muestraResumen() {
        echo '<b>Resumen dulce:</b><br>---------------------<br>'.'<b>Nombre = </b>'.$this->nombre.
        '<br><b>Número = </b>'.$this->numero.
        '<br><b>Precio = </b>'.$this->getPrecio().' €'.
        '<br><b>Precio con IVA = </b>'.$this->getPrecioConIVA().' €'.
        '<br><b>Relleno = </b>'.$this->relleno;
    }
}

?>