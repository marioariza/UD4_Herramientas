<?php

include "Pasteleria.php";
include "Cliente.php";
include "Dulces.php";
include "Tarta.php";
include "Bollo.php";
include "Chocolate.php";

$pasteleria = new Pasteleria("Confitería la Campana");

$pasteleria->incluirTarta("Tarta tres chocolates", 34, 4, ["Chocolate negro, Chocolate con leche, Chocolate blanco"], 3, 1, 1);

$pasteleria->listarProductos();

$chocolate1 = new Chocolate("Palmera de chocolate", 3, 1.8, 60, 165);

$chocolate1->setPorcentajeCacao(70);