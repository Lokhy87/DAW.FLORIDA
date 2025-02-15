<?php
require_once("./class/perro.php");
require_once("./class/gato.php");
require_once("./class/pajaro.php");

$perro = new Perro("Nala", 9);
$gato = new Gato("Duque", 4);
$pajaro = new Pajaro("Piolin", 2);

$perro->hacerSonido();
$gato->hacerSonido();
$pajaro->hacerSonido();