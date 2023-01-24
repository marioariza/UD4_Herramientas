<?php

include "Dulces.php";

echo "Da error al instanciar la clase Dulces ya que ahora esta clase es abstracta.<br><br>";

$dulce1 = new Dulces("Donut", 22, 2);

$dulce1->muestraResumen();

// Da error al instanciar la clase Dulces ya que ahora esta clase es abstracta.

?>