<?php 

class Dulces {
    public string $nombre;
    protected int $numero;
    private float $precio;

    const IVA = 0.21;

    public function __construct($nombre, $numero, $precio)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
 
    public function getNumero()
    {
        return $this->numero;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIVA() : float {  
        return number_format($this->precio + ($this->precio * self::IVA), 2); 
    }

    public function muestraResumen() {
        echo '<b>Resumen dulce:</b><br>********************<br>'.'<b>Nombre = </b>'.$this->nombre.
        '<br><b>Número = </b>'.$this->numero.
        '<br><b>Precio = </b>'.$this->precio.' €'.
        '<br><b>Precio con IVA = </b>'.$this->getPrecioConIVA().' €';
    }
}

?>