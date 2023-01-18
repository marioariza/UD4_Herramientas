<?php

class Pasteleria {
    public string $nombre;
    private array $productos = [];
    private int $numProductos = 0;
    private array $clientes = [];
    private int $numClientes = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
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

    public function getProductos()
    {
        return $this->productos;
    }

    public function setProductos($productos)
    {
        $this->productos = $productos;

        return $this;
    }

    public function getClientes()
    {
        return $this->clientes;
    }

    public function setClientes($clientes)
    {
        $this->clientes = $clientes;

        return $this;
    }
 
    private function incluirProducto(Dulces $producto) {
        $this->productos[$this->numProductos] = $producto;
        echo "INCLUIDO PRODUCTO " . $this->numProductos+1 . 
        '<br>****************************<br><b>Nombre = </b>' . $producto->getNombre();
        $this->numProductos++;
    }

    public function incluirTarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC) {
        $tarta = new Tarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC);
        $this->incluirProducto($tarta);
    }

    public function incluirBollo($nombre, $numero, $precio, $rellenos) {
        $bollo = new Bollo($nombre, $numero, $precio, $rellenos);
        $this->incluirProducto($bollo);
    }

    public function incluirChocolate($nombre, $numero, $precio, $porcentajeCacao, $peso) {
        $chocolate = new Chocolate($nombre, $numero, $precio, $porcentajeCacao, $peso);
        $this->incluirProducto($chocolate);
    }

    public function incluirCliente($nombre, $numero) {
        $cliente = new Cliente($nombre, $numero);
        $this->clientes[$this->numClientes] = $cliente;
        echo "INCLUIDO CLIENTE " . $this->numClientes+1 . 
        '<br>****************************<br><b>Nombre = </b>' . $cliente->getNombre();
        $this->numClientes++;
    }

    public function listarProductos() {
        echo "<p>Listado de los " . $this->numProductos . " productos disponibles:"; 
        if ($this->numProductos == 0) {
            echo"<br>No existen productos en la pastelería ahora mismo.";
        } else {
            for ($i=0;$i<$this->numProductos;$i++){ 
                echo "<br><br>"; 
                $this->getProductos()[$i]->muestraResumen(); 
            } 
        }
    }

    public function listarClientes() {
        echo "<p>Listado de los ".$this->numClientes." socios del videoclub:"; 
        if ($this->numClientes == 0) {
            echo"<br>No existen clientes en la pastelería ahora mismo.";
        } else {
            for ($i=0;$i<$this->numClientes;$i++){ 
                echo "<br><br>"; 
                $this->getClientes()[$i]->muestraResumen(); 
            } 
        }
    }

    public function comprarClienteProducto($numeroCliente, $numeroProducto) {
        if (is_null($this->getClientes()[$numeroCliente])){
            echo "Este cliente no puede comprar ya que no existe.";
        }elseif(is_null($this->getProductos()[$numeroProducto])){ 
            echo "Este producto no se puede comprar ya que no existe.";
        }else{ 
            $this->getClientes()[$numeroCliente]->comprar($this->getProductos()[$numeroProducto]); 
        }
    }

    public function muestraResumen()
    {
        echo '<b>Resumen pastelería:</b><br>********************<br>' . '<b>Nombre = </b>' . $this->nombre .
            '<br><b>Número de productos que hay en la pastelería = </b>' . $this->numProductos;
        for ($i = 0; $i < $this->numProductos; $i++) {
            echo "<br>Productos de la pastelería:";
            $this->getProductos()[$i]->muestraResumen();
        }
        '<br><b>Número de clientes que hay en la pastelería = </b>' . $this->numClientes;
        for ($i = 0; $i < $this->numProductos; $i++) {
            echo "<br>Clientes de la pastelería:";
            $this->getClientes()[$i]->muestraResumen();
        }
    }
}

?>