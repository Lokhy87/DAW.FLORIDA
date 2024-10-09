<!DOCTYPE html>
<html>
<head>
    <title>AHORRO</title>
</head>
<body>
    <h1>Se requiere un algoritmo para determinar cuánto ahorrará una persona en un año, si al final de cada mes deposita cantidades de dinero diferentes; 
        además, se requiere saber cuánto lleva ahorrado cada mes.</h1>

    <?php
    $total_cuenta = 0;

    for ($n = 1; $n <= 12; $n++) {
        $ahorro_mes = rand(1, 500);
        $total_cuenta += $ahorro_mes;
         
        echo "En el mes $n has ahorrado $ahorro_mes<br>";
    }

    echo "Este año has ahorrado un total de: $total_cuenta";
    ?>
</body>
</html>