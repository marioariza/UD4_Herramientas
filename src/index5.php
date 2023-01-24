<?php

include "Pasteleria.php";
include "Cliente.php";
include "Dulces.php";
include "Tarta.php";
include "Bollo.php";
include "Chocolate.php";

$pasteleria = new Pasteleria("Confitería la Campana");

$cliente1 = new Cliente("Mario", 7);
$cliente2 = new Cliente("Javier", 12);
$cliente3 = new Cliente("Manuel", 2);
$cliente4 = new Cliente("Guillermo", 8);

$tarta1 = new Tarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);
$tarta2 = new Tarta("Tarta de la abuela", 33, 4, ["Chocolate, Natilla, Galleta"], 3, 1, 4);
$bollo1 = new Bollo("Cuña de chocolate", 15, 1.5, "Crema");
$bollo2 = new Bollo("Magdalena", 12, 1.2, "Chocolate blanco");
$bollo3 = new Bollo("Croissant", 18, 1.3, "Chocolate");
$chocolate1 = new Chocolate("Palmera de chocolate", 3, 1.8, 70, 165);
$chocolate2 = new Chocolate("Chocolate negro", 4, 2.3, 85, 100);
$chocolate3 = new Chocolate("Kinder Schoko-Bons", 6, 3.5, 16.5, 46);



echo "<h2>PRUEBA PASTELERÍA</h2>";
// Incluimos dulces de prueba.
$pasteleria->incluirTarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirTarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirTarta("Tarta de la abuela", 33, 4, ["Chocolate, Natilla, Galleta"], 3, 1, 4);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirBollo("Cuña de chocolate", 15, 1.5, "Crema");
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirBollo("Magdalena", 12, 1.2, "Chocolate blanco");
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirBollo("Croissant", 18, 1.3, "Chocolate");
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirChocolate("Palmera de chocolate", 3, 1.8, 70, 165);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirChocolate("Chocolate negro", 4, 2.3, 85, 100);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirChocolate("Kinder Schoko-Bons", 6, 3.5, 16.5, 46);
echo "<br><br>-----------------------------------------<br><br>";
// Listamos los productos.
$pasteleria->listarProductos();
echo "<br><br>-----------------------------------------<br><br>";
// Incluimos clientes de prueba.
$pasteleria->incluirCliente("Mario", 7);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirCliente("Javier", 12);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirCliente("Manuel", 2);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirCliente("Manuel", 2);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->incluirCliente("Guillermo", 8);
echo "<br><br>-----------------------------------------<br><br>";
// Listamos los clientes.
$pasteleria->listarClientes();
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->comprarClienteProducto(7, 12);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->comprarClienteProducto(8, 4);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->comprarClienteProducto(7, 50);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->comprarClienteProducto(2, 6);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->comprarClienteProducto(13, 6);
echo "<br><br>-----------------------------------------<br><br>";
$pasteleria->muestraResumen();
echo "<br><br>-----------------------------------------<br><br>";



echo "<br><br>";



echo "<h2>PRUEBA CLIENTE</h2>";
$cliente1->comprar([$tarta1,$bollo1,$chocolate3,$tarta1]);
echo "<br><br>-----------------------------------------<br><br>";
$cliente2->comprar([$tarta2,$bollo3,$chocolate1]);
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->listarPedidos();
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->valorar($tarta1, "La mejor tarta del mundo :)");
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->valorar($tarta2, "Tarta buena pero las hay mejores");
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->muestraResumen();

?>