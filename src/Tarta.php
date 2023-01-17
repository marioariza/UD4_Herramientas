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
        if ($this->minNumComensales == $this->maxNumComensales && $this->minNumComensales > 0) {
            if ($this->minNumComensales < 2) {
                return 'Para '.$this->minNumComensales. ' comensal.';
            } else {
                return 'Para '.$this->minNumComensales. ' comensales.';
            }
        } else if ($this->minNumComensales > 2 && $this->maxNumComensales > 2 && $this->minNumComensales == $this->maxNumComensales) {
            return 'Para '.$this->minNumComensales.' comensales.';
        } else if ($this->minNumComensales >= 2 && $this->maxNumComensales < 2) {
            return 'Para '.$this->minNumComensales.' comensales.';
        } else if ($this->minNumComensales <= 0 && $this->maxNumComensales <= 0) {
            return 'No se puede comer la tarta.';
        } else if ($this->minNumComensales <= 0 && $this->maxNumComensales > 1) {
            return 'De '.$this->minNumComensales. ' a '.$this->maxNumComensales.' comensales.';
        } else {
            return 'De '.$this->minNumComensales. ' a '.$this->maxNumComensales.' comensales.';
        }
    }

    public function muestraResumen() {
        parent::muestraResumen();
        foreach ($this->relleno as $rell) {
            echo '<br><b>Relleno = </b>'.$rell;
        }
        echo '<br><b>Número de pisos = </b>'.$this->numPisos.
        '<br><b>Comensales = </b>'.$this->muestraComensalesPosibles();
    }
}

?>