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
        parent::muestraResumen();
        echo '<br><b>Relleno = </b>'.$this->relleno;
    }
}

?>