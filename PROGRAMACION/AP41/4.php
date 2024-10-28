<!DOCTYPE html>
<html>
<head>
    <title>LANZAMIENTO DADOS</title>
</head>
<body>
    <h1>Escribir un programa que simule el lanzamiento de dos dados. Haz uso de la función random_int() para obtener números aleatorios entre 1 y 6 para 
        cada uno de los lanzamientos de los dos dados. Esto se repite por cada jugador, siendo 2 el número de jugadores y 5 tiradas cada uno. 
        Almacena en un array para cada tirada que jugador gana, o si empatan
        Con el array generado de victorias y empates, calcula los porcentajes de partidas ganadas por el jugador 1, por el jugador 2 y los empates</h1>

    <?php
    
    $resultados = [];

    for ($i = 0; $i < 5; $i++) {
        $dado1 = random_int(1,6);
        $dado2 = random_int(1,6);   

        if ($dado1 == $dado2) {
            echo "El resultado es un empate";
            $resultados[] = 'Empate';
        } elseif ($dado1 > $dado2) {
            echo "El ganador es el jugador 1";
            $resultados[] = "Jugador 1";
        } else {
            echo "El ganador es el jugador 2";
            $resultados[] = "Jugador 2";
        }
    }

    $ganador1 = 0;
    $ganador2 = 0;
    $empates = 0;

    foreach ($resultados as $resultado) {
        if ($resultado == "Jugador 1") {
            $ganador1++;
        } elseif ($resultado == "Jugador 2") {
            $ganador2++;
        } else {
            $empates++;
        }
    }
    
    $totalTiradas = count($resultados);
    $totalVictorias1 = ($ganador1 / $totalTiradas) * 100;
    $totalVictorias2 = ($ganador2 / $totalTiradas) * 100;
    $totalEmpates = ($empates / $totalTiradas) * 100;
    
    echo "El porcentaje de victorias del Jugador 1 es $totalVictorias1 %<br>";
    echo "El porcentaje de victorias del Jugador 2 es $totalVictorias2 %<br>";
    echo "El porcentaje de Empates es $totalEmpates %<br>";

    ?>
</body>
</html>
