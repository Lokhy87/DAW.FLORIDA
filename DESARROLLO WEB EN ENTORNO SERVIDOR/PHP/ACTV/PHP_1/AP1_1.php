<?php 

// Recibiendo datos por ruta

$cocheColor = array("Rojo" => "Ferrari",
            "Amarillo" => "Lamborghini",
            "Naranja" => "Mclaren"); 

foreach ($cocheColor as $clave => $valor) {
    echo "Se ha recibido el valor $valor para la clave $clave .";
}



