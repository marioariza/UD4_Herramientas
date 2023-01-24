<?php

use Monolog\Logger;
use util\LogFactory;

include_once '../util/ClienteNoEncontradoException.php';
include_once '../util/DulceNoEncontradoException.php';
include_once '../util/DulceNoCompradoException.php';
include_once '../util/PasteleriaException.php';
include_once '../pruebaLog.php';
include_once '../util/LogFactory.php';


class Pasteleria {
    public string $nombre;
    private array $productos = [];
    private int $numProductos = 0;
    private array $clientes = [];
    private int $numClientes = 0;
    private Logger $log;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->log = LogFactory::getLogger();
    }

    /**
     * Sumario de getNombre
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sumario de setNombre
     * @param string $nombre
     * @return Pasteleria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Sumario de getProductos
     * @return array
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Sumario de setProductos
     * @param array $productos
     * @return Pasteleria
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;

        return $this;
    }

    /**
     * Sumario de getClientes
     * @return array
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Sumario de setClientes
     * @param array $clientes
     * @return Pasteleria
     */
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;

        return $this;
    }
 
    /**
     * Sumario de incluirProducto
     * Incluye los dulces al array de productos de la pastelería
     * @param Dulces $producto
     * @return void
     */
    private function incluirProducto(Dulces $producto) {
        if (in_array($producto, $this->productos)) {
            $this->log->error("Este producto no se puede incluir porque ya existe.");
            echo "Este producto no se puede incluir porque ya existe.";
        } else {
            $this->productos[$this->numProductos] = $producto;
            echo "INCLUIDO PRODUCTO " . $this->numProductos+1 . 
            '<br>****************************<br><b>Nombre = </b>' . $producto->getNombre();
            $this->numProductos++;
        }

    }

    /**
     * Sumario de incluirTarta
     * Creamos la tarta y la mandamos a incluirProducto()
     * @param string $nombre
     * @param float $precio
     * @param int $numPisos
     * @param int $minC
     * @param int $maxC
     * @param array $rellenos
     * @return void
     */
    public function incluirTarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC) {
        $tarta = new Tarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC);
        $this->incluirProducto($tarta);
    }

    /**
     * Sumario de incluirBollo
     * Creamos la tarta y la mandamos a incluirProducto()
     * @param string $nombre
     * @param float $precio
     * @param string $relleno
     * @return void
     */
    public function incluirBollo($nombre, $numero, $precio, $rellenos) {
        $bollo = new Bollo($nombre, $numero, $precio, $rellenos);
        $this->incluirProducto($bollo);
    }

    /**
     * Sumario de incluirChocolate
     * Creamos el chocolate y la mandamos a incluirProducto()
     * @param string $nombre
     * @param float $precio
     * @param float $porcentajeCacao
     * @param float $peso
     * @return void
     */
    public function incluirChocolate($nombre, $numero, $precio, $porcentajeCacao, $peso) {
        $chocolate = new Chocolate($nombre, $numero, $precio, $porcentajeCacao, $peso);
        $this->incluirProducto($chocolate);
    }

    /**
     * Sumario de incluirCliente
     * Crea un cliente y lo incluye en la pastelería
     * @param string $nombre
     * @param int $numero
     * @return void
     */
    public function incluirCliente($nombre, $numero) {
        $cliente = new Cliente($nombre, $numero);
        
        if (in_array($cliente, $this->clientes)) {
            $this->log->error("Este cliente no se puede incluir porque ya existe.");
            echo "Este cliente no se puede incluir porque ya existe.";
        } else {
            $this->clientes[$this->numClientes] = $cliente;
            echo "INCLUIDO CLIENTE " . $this->numClientes+1 . 
            '<br>****************************<br><b>Nombre = </b>' . $cliente->getNombre();
            $this->numClientes++;
        }
    
    }

    /**
     * Sumario de listarProductos
     * Devuelve y muestra todos los productos que tenemos en la pastelería, si no tenemos ninguno también lo dirá.
     * @return void
     */
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

    /**
     * Sumario de listarClientes
     * Devuelve y muestra todos los clientes que tenemos en la pastelería, si no tenemos ninguno también lo dirá.
     * @return void
     */
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

    /**
     * Sumario de comprarClienteProducto
     * Recibimos el número del cliente y el número del producto.
     * Si los dos se encuentran en la pastelería iremos al método comprar de la clase Cliente.
     * Si alguno de los dos no se encuentra en la pastelería lo mostraremos mediante una excepción.
     * @param int $numeroCliente
     * @param int $numeroDulce
     * @throws ClienteNoEncontrado
     * @throws DulceNoEncontrado
     * @return void
     */
    public function comprarClienteProducto($numeroCliente, $numeroProducto) {

        $clienteC = null;
        $productoC = null;

        foreach ($this->clientes as $cliente) {
            if($cliente->getNumero() == $numeroCliente){
                $clienteC = $cliente;
            } 
        }

        if ($clienteC == null) {
            $this->log->error("Este cliente no existe así que no podrá comprar.");
            throw new ClienteNoEncontrado("Este cliente no existe así que no podrá comprar.");
        } else {
            foreach ($this->productos as $producto) {
                if($producto->getNumero() == $numeroProducto){
                    $productoC = $producto;
                }
            }

            if ($productoC == null) {
                $this->log->error("Este producto no existe así que no podrá ser comprado.");
                throw new DulceNoEncontrado("Este producto no existe así que no podrá ser comprado.");
            } else {
                $clienteC->comprar([$productoC]);
            }
        }

    }

    /**
     * Sumario de muestraResumen
     * Mostramos el resumen de la pastelería mostrando el nombre de la misma y también un resumen
     * de los productos y los clientes que se encuentran en ella. De los clientes y productos también
     * mostrará el número en total que hay en cada uno de ellos.
     * @return void
     */
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