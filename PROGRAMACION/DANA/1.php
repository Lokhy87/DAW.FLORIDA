<!DOCTYPE html>
<html>
<head>
    <title>Cantidades de lluvia en distintas horas del dia</title>
</head>
<body>
    <h1>Imaginemos que queremos registrar la cantidad de lluvia que cae en cada hora de un día de tormenta. Utilizar un array para almacenar datos de 
        precipitaciones por cada hora.

        Crear un array con 24 posiciones, cada una representando una hora del día, y llenarla con datos de precipitaciones aleatorios 
        (valores en milímetros de lluvia entre 0 y 100).
        
        Usar un bucle for para recorrer el array y calcular el total de precipitaciones del día.
        
        Añadir condiciones para detectar si alguna hora supera los 50 mm de lluvia, en cuyo caso deberán imprimir un mensaje de alerta.</h1>

    <?php
    $precipitaciones = array();
    $totalPrecipitaciones = 0;

    for ($i; $i < 24; $i++) {
        $precipitaciones[$i] = random_int(0, 100);
        $totalPrecipitaciones += $precipitaciones[$i];

        if ($precipitaciones[$i] > 50){
            echo "Alerta, precipitaciones masivas";
        }
    }
    
    echo "Precipitaciones por hora: ". $precipitaciones; 
    echo "Precipitaciones total en el dia: ". $totalPrecipitaciones; 
    ?>
</body>
</html>
