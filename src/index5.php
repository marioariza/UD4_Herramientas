<?php

include "Cliente.php";
include "Dulces.php";
include "Tarta.php";
include "Bollo.php";

$cliente1 = new Cliente("Mario", 7);

$bollo1 = new Bollo("Cuña de chocolate", 15, 1.5, "Crema");
$tarta1 = new Tarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);
$tarta2 = new Tarta("Tarta de la abuela", 33, 4, ["Chocolate, Natilla, Galleta"], 3, 1, 1);

$cliente1->comprar($tarta1);
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->comprar($tarta1);
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->comprar($bollo1);
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->valorar($tarta1, "La mejor tarta del mundo :)");
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->valorar($tarta2, "Tarta buena pero las hay mejores");
echo "<br><br>-----------------------------------------<br><br>";
$cliente1->muestraResumen();



?>