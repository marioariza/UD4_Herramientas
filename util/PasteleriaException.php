<?php 

class PasteleriaException extends Exception{

    function ClienteNoEncontrado () {
        echo "Este cliente no puede comprar ya que no existe.";
    }

    function DulceNoEncontrado () {
        echo "Este producto no se puede comprar ya que no existe.";
    }

    function DulceNoComprado () {
        echo "El dulce no se puede comprar ya que ya ha sido comprado anteriormente.";
    }

}

?>