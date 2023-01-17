<?php 

include_once 'Dulces.php';

class Chocolate extends Dulces {
    private int $porcentajeCacao;
    private float $peso;

    public function __construct($nombre, $numero, $precio, $porcentajeCacao, $peso)
    {
        parent::__construct($nombre, $numero, $precio);  
        $this->porcentajeCacao = $porcentajeCacao;
        $this->peso = $peso;
    }


    public function getPorcentajeCacao()
    {
        return $this->porcentajeCacao;
    }

    public function setPorcentajeCacao($porcentajeCacao)
    {
        $this->porcentajeCacao = $porcentajeCacao;

        return $this;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    public function muestraResumen() {
        echo '<b>Resumen dulce:</b><br>---------------------<br>'.'<b>Nombre = </b>'.$this->nombre.
        '<br><b>Número = </b>'.$this->numero.
        '<br><b>Precio = </b>'.$this->getPrecio().' €'.
        '<br><b>Precio con IVA = </b>'.$this->getPrecioConIVA().' €'.
        '<br><b>Porcentaje de cacao = </b>'.$this->porcentajeCacao.' %'.
        '<br><b>Peso = </b>'.$this->peso.' gramos';
    }
}

?>