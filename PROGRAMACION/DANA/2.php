<!DOCTYPE html>
<html>
<head>
    <title>Estaciones meteorologicas en distintos puntos</title>
</head>
<body>
    <h1>Supongamos que en Valencia hay varias estaciones meteorológicas. Cada estación mide la precipitación cada hora. Vamos a trabajar con un 
        array bidimensional donde cada fila representa una estación y cada columna representa una hora.

        Crear un array bidimensional, con 5 filas (estaciones) y 24 columnas (horas).

        Llenar el array con valores aleatorios de precipitaciones (entre 0 y 100).

        Usar un bucle para recorrer el array y calcular el total de precipitaciones en cada estación.

        Identificar la estación con la mayor acumulación de lluvia en el día.</h1>

    <?php
    $estaciones = array();
    $totalEstaciones = array();
    $maxPrecipitaciones = 0;

    for ($i = 0; $i < 5; $i++) {
        $totalEstaciones[$i] = 0;
        for ($j = 0; $j < 24; $j++) {
            $estaciones[$i][$j] = random_int(0,100);
            $totalEstaciones[$i] += $estaciones[$i][$j];
        }
    }


    ?>
</body>
</html>
