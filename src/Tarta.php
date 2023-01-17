<?php 

include_once 'Dulces.php';

class Tarta extends Dulces {
    private array $relleno = [];
    private int $numPisos;
    private int $maxNumComensales;
    private int $minNumComensales;

    public function __construct($nombre, $numero, $precio, $relleno, $numPisos, $maxNumComensales, $minNumComensales = 2)
    {
        parent::__construct($nombre, $numero, $precio);  
        $this->relleno = $relleno;
        $this->numPisos = $numPisos;
        $this->maxNumComensales = $maxNumComensales;
        $this->minNumComensales = $minNumComensales;
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

    public function getNumPisos()
    {
        return $this->numPisos;
    }

    public function setNumPisos($numPisos)
    {
        $this->numPisos = $numPisos;

        return $this;
    }

    public function getMaxNumComensales()
    {
        return $this->maxNumComensales;
    }

    public function setMaxNumComensales($maxNumComensales)
    {
        $this->maxNumComensales = $maxNumComensales;

        return $this;
    }

    public function getMinNumComensales()
    {
        return $this->minNumComensales;
    }

    public function setMinNumComensales($minNumComensales)
    {
        $this->minNumComensales = $minNumComensales;

        return $this;
    }

    public function muestraComensalesPosibles () {
        if ($this->minNumComensales == 1 && $this->maxNumComensales == 1) {
            return 'Juego para un jugador.';
        } else if ($this->minNumComensales > 1 && $this->maxNumComensales > 1 && $this->minNumComensales == $this->maxNumComensales) {
            return 'Juego para '.$this->minNumComensales.' jugadores.';
        } else {
            return 'Juego de '.$this->minNumComensales. ' a '.$this->maxNumComensales.' jugadores.';
        }
    }

    public function muestraResumen() {
        echo '<b>Resumen dulce:</b><br>---------------------<br>'.'<b>Nombre = </b>'.$this->nombre.
        '<br><b>Número = </b>'.$this->numero.
        '<br><b>Precio = </b>'.$this->getPrecio().' €'.
        '<br><b>Precio con IVA = </b>'.$this->getPrecioConIVA().' €'.
        '<br><b>Relleno = </b>'.$this->relleno.
        '<br><b>Número de pisos = </b>'.$this->numPisos.
        '<br><b>Comensales = </b>'.$this->muestraComensalesPosibles();
    }
}

?>