<?php

/* Al hacer las clases abstractas conseguimos que no se instancien y sólo puedan ser heredadas, trasladando así 
un funcionamiento obligatorio a clases hijas. Mejoran la calidad del código y ayudan a reducir la cantidad de código duplicado. */

include_once 'Resumible.php'; // No hace falta que las demás clases implemente el interfaz ya que lo implenta la clase Padre.

abstract class Dulces implements Resumible{
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
        $precio_IVA = number_format($this->precio + ($this->precio * self::IVA), 2);
        return (float) $precio_IVA;
    }

    public function muestraResumen() {
        echo '<b>Resumen dulce:</b><br>********************<br><b>Nombre = </b>'.$this->nombre.
        '<br><b>Número = </b>'.$this->numero.
        '<br><b>Precio = </b>'.$this->precio.' €'.
        '<br><b>Precio con IVA = </b>'.$this->getPrecioConIVA().' €';
    }
}

?>