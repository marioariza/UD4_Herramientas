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

        $this->expectOutputString("INCLUIDO PRODUCTO 1 <br>****************************<br><b>Nombre = </b> Tarta tres chocolates");
        $pasteleria->listarProductos();
    }
}