<?php
namespace Utilidades;

const VERSION = '1.0';

function saludar() {
    return "¡Hola desde el namespace Utilidades!";
}
echo \Utilidades\VERSION;
echo \Utilidades\saludar();
?>