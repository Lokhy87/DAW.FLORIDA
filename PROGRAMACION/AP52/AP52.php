<?php
echo "<h1>METEOROLOGIA</h1>
<h2>Realiza un script en PHP, a partir del array de datos siguiente:

Se ha detectado que algunas estaciones tienen un fallo de software. Cuando se notifica este fallo, el usuario puede corregir el dato mediante la llamada a la función fixPressure, cuyo cometido será cambiar 
este dato, teniendo en cuenta que la estación averiada mide:
un 15% menos de presión atmosférica respecto a la presión real si la temperatura es menor a 30ºC
o un 25% menos a partir de una temperatura de 30ºC o más
A la función se le pasará como parámetro la estación averiada (será un número) y el array que quiero corregir (todo por valor).
Devolverá el array con los datos correctos.
Crea la función show, que debe mostrará por pantalla la información de todas las estaciones. Servirá sobre todo para mirar el índice de la estación que queremos corregir para pasárselo al punto anterior

Cada vez que corrijamos una estación, debemos volver a mostrar la lista completa para que se vea el cambio realizado.
Crea la función averageTemperature, que debe devolver la media aritmética de temperaturas de las diferentes estaciones meteorológicas. Se le pasará como parámetro el array de las estaciones.</h2>"; 

// Codigo 
$meteorologicalData = [
    [
        'station' => 'Catarroja',
        'temperature' => 15,
        'humidity' => 85,
        'atmosphericPressure' => 1024
    ],
    [
        'station' => 'Alzira',
        'temperature' => 35,
        'humidity' => 75,
        'atmosphericPressure' => 1000
    ],
    [
        'station' => 'Almussafes',
        'temperature' => 17,
        'humidity' => 95,
        'atmosphericPressure' => 950
    ],
    [
        'station' => 'Carlet',
        'temperature' => 31,
        'humidity' => 55,
        'atmosphericPressure' => 850
    ]
  ];

// Funcion fixPressure
function fixPressure($stationIndex, $data){
    $stationData = $data[$stationIndex];    // Obtiene los datos de la estacion especifica

    // Corregir Presion
    if ($stationData['temperature'] < 30){
        $realPresion = $stationData['atmosphericPressure'] / 0.85;
    } else {
        $realPresion = $stationData['atmosphericPressure'] / 0.75;
    }

    // Actualizar Presion en el array original
    $data[$stationIndex]['atmosphericPressure'] = $realPresion;

    return $data;
}

// Funcion show
function show($data){
    foreach($data as $index => $station){
        echo "Indice: $index<br>";
        echo "Estacion: ". $station['station']."<br>";
        echo "Temperatura: ". $station['temperature']. " ºC<br>"; 
        echo "Humedad: ". $station['humidity']. " %<br>";
        echo "Presion Atmosferica: ". $station['atmosphericPressure']. "hPa<br>";
        echo str_repeat("-", 10)."<br><br>";
    }
}

// Funcion averageTemperatura
function averageTemperatura($data){
    $sumaTemperaturas = 0;
    $totalEstaciones = count($data);

    foreach($data as $valor){
        $sumaTemperaturas += $valor['temperature'];
    }
    // Calcular la media
    $media = $sumaTemperaturas / $totalEstaciones;
    return $media;
}

// Visualizaciones 
show($meteorologicalData); // Originales 

$stationIndex = 1; // Ejemplo Alzira
$correctionData = fixPressure($stationIndex, $meteorologicalData);

show($correctionData); // Verificados 

// Media Aritmetica
$media = averageTemperatura($meteorologicalData); 
echo "La Media Aritmética del total de estaciones es: $media.";

?>