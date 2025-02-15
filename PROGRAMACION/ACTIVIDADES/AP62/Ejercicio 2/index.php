<?php
require_once("./class/factura_electronica.php");

$factura1 = new Factura_electronica(2, "Jose", 200000, "pepe@gmail.com");

var_dump($factura1);