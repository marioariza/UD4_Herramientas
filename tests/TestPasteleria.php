<?php

use Pasteleria;
use PHPUnit\Framework\TestCase;

class TestPasteleria extends TestCase
{
    public function testIncluirTarta()
    {
        $pasteleria = new Pasteleria("Pastelería Los Hermanos Moyazo");
        $pasteleria->incluirTarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);

        $this->assertSame($pasteleria->getProductos()[0]->getNumero(), 34);
    }

    public function testListarProductos()
    {
        $pasteleria = new Pasteleria("Pastelería Los Hermanos Moyazo");
        $pasteleria->incluirTarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);

        $this->expectOutputString('<b>Resumen dulce:</b><br>********************<br><b>Nombre = </b>Tarta tres chocolates<br><b>Número = </b>34
        <br><b>Precio = </b>4 €<br><b>Precio con IVA = </b>4.84 €<br><b>Relleno = </b>Chocolate negro, Chocolate con leche, Chocolate blanco
        <br><b>Número de pisos = </b>3<br><b>Comensales = </b>Para 1 comensal.');
        $pasteleria->listarProductos();
    }
}

?>