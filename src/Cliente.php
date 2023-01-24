<?php

class Cliente {
    public string $nombre;
    private int $numero;
    private array $dulcesComprados = [];
    private int $numDulcesComprados = 0;
    private int $numPedidosEfectuados;

    public function __construct($nombre, $numero, $numPedidosEfectuados = 0)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->numPedidosEfectuados = $numPedidosEfectuados;
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

    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }

    public function setNumPedidosEfectuados($numPedidosEfectuados)
    {
        $this->numPedidosEfectuados = $numPedidosEfectuados;

        return $this;
    }

    public function comprar(Array $d) {

        for ($i = 0; $i < count($d); $i++) {
            if ($this->listaDeDulces($d[$i]) == false) {
                $this->numDulcesComprados++;
                echo "Dulce comprado con éxito. (" . $d[$i]->getNombre() . "). Número de dulces comprados: " . $this->numDulcesComprados. "<br><br>";
                array_push($this->dulcesComprados, $d[$i]);
                if ($this->numDulcesComprados >= 1) {
                    $this->numPedidosEfectuados++;
                    echo "PEDIDO REALIZADO CON ÉXITO. Número de pedidos realizados: " . $this->getNumPedidosEfectuados();
                }
            } else if ($this->listaDeDulces($d[$i])) {
                throw new DulceNoComprado();
            }
        }
    }

    public function valorar(Dulces $d, string $c) {
        if ($this->listaDeDulces($d) == true) {
            echo "Gracias por dejar tu valoración " . $this->nombre . ", la usaremos para mejorar.
            <br><br>
            <b>Valoración: </b>" . $c;
        } else {
            echo "No puedes realizar la valoración de un dulce que no ha sido comprado.";
        }
    }

    public function listaDeDulces(Dulces $d) {
        
        if (in_array($d, $this->dulcesComprados)) {
            return true;
        } else {
            return false;
        }
    }

    public function listarPedidos() {

        echo "El cliente de nombre " .$this->nombre. " ha realizado " .$this->numPedidosEfectuados. " pedidos.<br><br>";
        foreach ($this->dulcesComprados as $dulc) {
            echo '<br><b>Dulce comprado = </b>'.$dulc->getNombre();
        }
    }

    public function muestraResumen() {
        echo '<b>Resumen cliente:</b><br>********************<br><b>Nombre = </b>' . $this->nombre .
            '<br><b>Número = </b>' . $this->numero;
        foreach ($this->dulcesComprados as $dulc) {
            echo '<br><b>Dulce comprado = </b>'.$dulc->getNombre();
        }
        echo '<br><b>Número de dulces comprados = </b>'.$this->numDulcesComprados.
        '<br><b>Número de pedidos realizados = </b>'.$this->numPedidosEfectuados;
    }
}

?>