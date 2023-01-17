<?php

class Cliente {
    public string $nombre;
    private int $numero;
    private array $dulcesComprados = [];
    private int $numDulcesComprados;
    private int $numPedidosEfectuados;

    public function __construct($nombre, $numero)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
 
    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function comprar(Dulces $d) {
        if ($this->listaDeDulces($d) == true) {
            $this->numDulcesComprados++;
            echo "Dulce comprado con éxito. Número de dulces comprados: ".$this->numDulcesComprados;
            array_push($this->dulcesComprados, $d);
        } else if ($this->listaDeDulces($d) == false && $this->numDulcesComprados >= 1) {
            echo "El dulce no se puede comprar ya que ha superado el máximo de dulces para un pedido. Número de dulces comprados: ".$this->numDulcesComprados;
        } else if ($this->listaDeDulces($d) == false && $this->numDulcesComprados < 1) {
            $this->numDulcesComprados++;
            echo "Dulce comprado con éxito. Número de dulces comprados: ".$this->numDulcesComprados;
            array_push($this->dulcesComprados, $d);
        }
    }

    public function valorar(Dulces $d, string $c) {
        
    }

    public function listaDeDulces(Dulces $d) : bool{
        if (in_array($d, $this->dulcesComprados)) {
            return true;
        } else {
            return false;
        }
    }

    public function listarPedidos() {

    }

    public function muestraResumen() {
        echo '<b>Resumen cliente:</b><br>---------------------<br>' . '<b>Nombre = </b>' . $this->nombre .
            '<br><b>Número = </b>' . $this->numero;
        foreach ($this->dulcesComprados as $dulc) {
            echo '<br><b>Relleno = </b>'.$dulc->getNombre;
        }
        echo '<br><b>Número de dulces comprados = </b>'.$this->numDulcesComprados.
        '<br><b>Número de pedidos realizados = </b>'.$this->numPedidosEfectuados;
    }
}

?>