<?php

include_once '../util/ClienteNoEncontradoException.php';
include_once '../util/DulceNoEncontradoException.php';
include_once '../util/DulceNoCompradoException.php';
include_once '../util/PasteleriaException.php';

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
        if (in_array($producto, $this->productos)) {
            echo "Este producto no se puede incluir porque ya existe.";
        } else {
            $this->productos[$this->numProductos] = $producto;
            echo "INCLUIDO PRODUCTO " . $this->numProductos+1 . 
            '<br>****************************<br><b>Nombre = </b>' . $producto->getNombre();
            $this->numProductos++;
        }

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
        
        if (in_array($cliente, $this->clientes)) {
            echo "Este cliente no se puede incluir porque ya existe.";
        } else {
            $this->clientes[$this->numClientes] = $cliente;
            echo "INCLUIDO CLIENTE " . $this->numClientes+1 . 
            '<br>****************************<br><b>Nombre = </b>' . $cliente->getNombre();
            $this->numClientes++;
        }
    
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

        $clienteC = null;
        $productoC = null;

        foreach ($this->clientes as $cliente) {
            if($cliente->getNumero() == $numeroCliente){
                $clienteC = $cliente;
            } 
        }

        if ($clienteC == null) {
            throw new ClienteNoEncontrado("Este cliente no existe así que no podrá comprar.");
        } else {
            foreach ($this->productos as $producto) {
                if($producto->getNumero() == $numeroProducto){
                    $productoC = $producto;
                }
            }

            if ($productoC == null) {
                throw new DulceNoEncontrado("Este producto no existe así que no podrá ser comprado.");
            } else {
                $clienteC->comprar([$productoC]);
            }
        }

    }

    public function muestraResumen()
    {
        echo '<b>Resumen pastelería:</b><br>********************<br>' . '<b>Nombre = </b>' . $this->nombre .
            '<br><b>Número de productos que hay en la pastelería = </b>' . $this->numProductos .
            '<br><b>Número de clientes que hay en la pastelería = </b>' . $this->numClientes .
            '<br><br><b>Productos de la pastelería:</b><br>-----------------------<br>';
            for ($i = 0; $i < $this->numProductos; $i++) {
            echo '<br><br>' . $this->getProductos()[$i]->muestraResumen();
        }
        '<br><b>Número de clientes que hay en la pastelería = </b>' . $this->numClientes .
        '<br><br>Productos de la pastelería:<br>-----------------------<br>';
        for ($i = 0; $i < $this->numClientes; $i++) {
            echo '<br><br>' . $this->getClientes()[$i]->muestraResumen();
        }
    }
}

?>