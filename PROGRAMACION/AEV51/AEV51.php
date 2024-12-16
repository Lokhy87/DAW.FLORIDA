<!DOCTYPE html>
<html>
<head>
    <title>POMODORO HATERS</title>
</head>
<body>
    <!-- <h1>Pomodoro Haters es una pequeña isla en medio del Pacífico donde vivía un científico valenciano natural de Buñol. Este simpático pero tremendamente anciano científico, anoche 
        justo en su lecho de muerte, quiso no morir sin asistir a una última tomatina. Llevaba tiempo estudiando un cúmulo de asteroides errantes provenientes del cinturón de las 
        Solanum lycopersicum, integrado por tomates gigantescos capaces de arrasar 1 km2 de superfície; así que hizo lo que debía y esta mañana murió feliz mientras su retina captaba 
        una última tomatina.

        Esta misma mañana, el cielo se ha oscurecido con un rojo intenso, y la pequeña isla ha recibido impactos múltiples, que han quedado registrados en el array $impacts, conteniendo éste 
        las coordenadas de cada impacto.

        La magnitud ha sido tal tal que todos los servicios se han visto desboradados. Estos asteroides, por suerte, no son letales, pero ensucian mucho y provocan escozor de ojos y conjuntivitis, y 
        por lo tanto, los servicios de emergencia desplazados necesitan saber:

            (1 puntos) Realiza una función para mostrar cualquier mapa que le pases por parámetro. En este caso, debes mostrar el mapa original de la isla, tal y como se muestra en la imagen de referencia. 
            Para ello, se proporciona un mapa en forma de array llamado $pomodoroHaters, en el que cada celda representa 1 km2, con la siguiente simbología:
                "0" -> tierra
                "~"-> mar
                "A"-> nucleo urbano

            (1 puntos) Qué nucleos urbanos se han visto afectados. Por ello debes marcar los nucleos urbanos que han recibido un impacto, inicialmente marcados con una "A", con una "C". Realiza una 
            función a la cual le pasas dos arrays: un mapa y unos impactos, y devuelve otro array con el mapa modificado tal y como describe el enunciado.

            (1 puntos) Una estimación de cuantos litros de colírio hacen falta para las personas afectadas, y cuantas personas van a necesitar este producto, teniendo en cuenta que la población media es 
            de 5000 habitantes por kilómetro cuadrado en nucleos urbanos, y que cada persona necesita 25ml para realizar un tratamiento completo. Realiza una función que reciba como parámetro un mapa y 
            nos devuelva un entero con las personas afectadas.

        Un ejército de agentes de seguros también se ha desplazada para hacer el peritaje de los daños económicos, por lo que necesitan:

            (2 puntos) El mapa de la isla con los impactos anteriormente marcados, más los impactos en territorio no habitado, marcado con una "X", y los impactos en el mar, marcados con una "S". 
            Realiza una función a la cual le pases un mapa y unos impactos y devuelva otro array con las modificaciones que describe el enunciado; en este caso, cuando llamemos a la función le pasaremos 
            el mapa resultante del segundo punto.

            (2 puntos) El recuento de daños total, en zona urbana, y en zona no urbana, teniendo en cuenta que cada km2 de zona no urbana cuesta 50.000€ de limpiar, y cada km2 de zona urbana cuesta 
            200.000€ de limpiar. 
            El tomate cuando se seca, ya se sabe... Realizaremos una función a la cual le pasaremos un mapa y devolverá un entero con los daños estimados.
        
        Los impactos en el mar, por contra, suponen una oportunidad de ayudar para la ONG Cocineros Vascos Sin Fronteras, y ya se han ofrecido para cocinar bakalao con tomate con todo el pescado que se 
        ha visto afectado y usar todo lo recaudado en la limpieza de la isla. Necesitan saber:

            (2 puntos) De cuanto pescado disponen, teniendo en cuenta que en todo el mar circundante se estima que hay aproximadamente un total de 2000 toneladas de bakalao. Realiza una función que 
            pasándole un mapa nos devuelva el total de mar que hay. Haremos otra para realizar lo mismo pero para saber tan solo el mar afectado.

            (1 puntos) Que recaudará la ONG, dado que cada kg de pescado empleado en la elaboración del bakalao con tomate se puede vender a 5€.</h1> -->

    <?php
    $pomodoroHaters = [
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', 'A', 'A', 'A', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '0', '0', '0', 'A', '0', 'A', 'A', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
        ['~', '~', '~', '~', '~', '0', '0', 'A', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
        ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', 'A', 'A', '0', '0', 'A', '0', '0', '0', '~', '~', '~'],
        ['~', '~', '~', '~', '0', 'A', 'A', '0', '0', 'A', '0', '0', '0', 'A', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', '0', '0', '0', 'A', '0', 'A', '0', '0', '0', '~'],
        ['~', '~', '~', '0', 'A', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'A', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '0', '0', '0', '0', 'A', '0', '0', '0', '0', 'A', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'A', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
        ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
        ];
    
    $impacts = [
        [20, 4],
        [2, 13],
        [13, 12],
        [3, 17],
        [2, 13],
        [5, 19],
        [6, 18],
        [5, 2],
        [20, 13],
        [9, 7],
        [5, 9],
        [15, 16],
        [16, 13],
        [16, 9],
        [16, 0],
        [3, 19],
        [19, 8],
        [1, 16],
        [18, 4],
        [21, 23],
        [7, 17],
        [22, 15],
        [21, 6],
        [14, 8],
        [12, 23],
        [7, 7],
        [22, 4],
        [3, 21],
        [2, 3],
        [8, 11],
        [0, 4],
        [7, 21],
        [11, 4],
        [7, 15],
        [6, 17],
        [5, 19],
        [4, 19],
        [4, 7],
        [23, 21],
        [15, 20],
        [2, 9],
        [21, 2],
        [1, 13],
        [7, 10],
        [21, 5],
        [13, 17],
        [2, 14],
        [11, 14],
        [22, 17],
        [18, 22],
        [2, 23],
        [3, 1],
        [18, 6],
        [17, 12],
        [18, 18],
        [20, 2],
        [3, 14],
        [11, 21],
        [6, 5],
        [6, 2],
        [12, 23],
        [18, 18],
        [21, 6],
        [10, 12],
        [5, 4],
        [16, 19],
        [8, 10],
        [12, 21],
        [15, 1],
        [20, 14],
        [3, 20],
        [6, 19],
        [20, 13],
        [15, 4],
        [10, 2],
        [5, 16],
        [20, 1],
        [12, 13],
        [11, 5],
        [12, 14],
        [8, 3],
        [6, 8],
        [19, 7],
        [16, 9],
        [13, 20],
        [3, 5],
        [1, 0],
        [20, 14],
        [12, 21],
        [12, 16],
        [15, 7],
        [9, 1],
        [1, 18],
        [20, 6],
        [8, 6],
        [22, 1],
        [10, 22],
        [19, 19],
        [7, 16],
        [8, 8]
        ];
        
    // FUNCION MOSTRAR MAPA 
    function mostrarMapa($mapa){
        foreach ($mapa as $linea){
            foreach ($linea as $celda){
                echo $celda . ' ';
            }
            echo "<br>";
        }
    }
    
    echo "<b>Mapa zonas originales</b><br>";
    mostrarMapa($pomodoroHaters);

    echo "<br>";

    // FUNCION IMPACTOS
    function nucleorUrbanos($mapa, $impactos){
        foreach ($impactos as $impacto){
            $fila = $impacto[0];
            $columna = $impacto[1];
            if ($fila >= 0 && $fila < count($mapa) && $columna >= 0 && $columna < count($mapa[0])){
                if ($mapa[$fila][$columna] == "A"){
                    $mapa[$fila][$columna] = "C";
                }
            }
        }
        return $mapa;
    }

    $nuevoMapa = nucleorUrbanos($pomodoroHaters, $impacts);
    echo "<b>Mapa zonas impactadas</b><br>";
    mostrarMapa($nuevoMapa); 

    echo "<br>";

    // FUNCION COLIRIO
    $poblacionMedia = 5000;
    function litrosColirio($mapa, $poblacionMedia){
        $personasAfectadas = 0;
        foreach ($mapa as $linea){
            foreach ($linea as $celda){
                if ($celda == "C"){
                    $personasAfectadas += $poblacionMedia;
                }
            }  
        }
        $litrosColirio = $personasAfectadas * 0.025;
        return[
            "personas" => $personasAfectadas,
            "litros" => $litrosColirio,
        ];
    }
    
    $resultado = litrosColirio($nuevoMapa, $poblacionMedia);
    
    echo "Personas afectadas: " . $resultado["personas"] . "<br>";
    echo "Litros de colirio necesarios: " . $resultado["litros"] . "<br><br>";

    // FUNCION TERRITORIOS NO HABITADOS Y EN EL MAR 
    function otrosImpactos($mapa, $impactos){
        foreach ($impactos as $impacto){
            $fila = $impacto[0];
            $columna = $impacto[1];
            if ($fila >= 0 && $fila < count($mapa) && $columna >= 0 && $columna < count($mapa[0])){
                if ($mapa[$fila][$columna] == "0"){
                    $mapa[$fila][$columna] = "X";
                } elseif ($mapa[$fila][$columna] == "~"){
                    $mapa[$fila][$columna] = "S";
                } 
            }
        }
        return $mapa;
    }

    $nuevosImpactos = otrosImpactos($nuevoMapa, $impacts);
    echo "<b>Mapa zonas con nuevos impactos</b><br>";
    mostrarMapa($nuevosImpactos); 

    echo "<br>";

    // FUNCION DAÑO TOTAL
    $zonaNoUrbana = 50000;
    $zonaUrbana = 200000;
    function dañosTotales($mapa, $zonaNoUrbana, $zonaUrbana){
        $zonasAfectadas = 0;
        foreach ($mapa as $linea){
            foreach ($linea as $celda){
                if ($celda == "C"){
                    $zonasAfectadas += $zonaUrbana;
                } elseif ($celda == "X"){
                    $zonasAfectadas += $zonaNoUrbana;
                }
            }  
        }
        return $zonasAfectadas;
    }

    $dañoTotal = dañosTotales($nuevosImpactos, $zonaNoUrbana, $zonaUrbana);
    echo "Daño total: " . $dañoTotal . "€";

    echo "<br>";

    // FUNCION MAR TOTAL Y AFECTADO
    function totalMar($mapa){
        $todoMar = 0;
        foreach ($mapa as $linea){
            foreach ($linea as $celda){
                if ($celda == "~"){
                    $todoMar += 1;
                }
            }  
        }
    return $todoMar;
    }

    $marTotal = totalMar(($nuevoMapa));
    echo "<b>Total de km de mar: </b>" . $marTotal . " Km^2<br>";

    function marAfectado($mapa){
        $totalAfectado = 0;
        foreach ($mapa as $linea){
            foreach ($linea as $celda){
                if ($celda == "S"){
                    $totalAfectado += 1;
                }
            }  
        }
    return $totalAfectado;
    }

    $marImpactado = marAfectado($nuevosImpactos);
    echo "<b>Total de km de mar afectado: </b>" . $marImpactado . " Km^2<br>";

    // RECAUDACION ONG
    $totalBakalao = 20000;
    $precio = 5;
    
    $bakalaoImpactado = ($marImpactado / $marTotal) * $totalBakalao; 
    $recaudacionTotal = $bakalaoImpactado * $precio;

    echo "<b>Recaudación ONG: </b>" . round($recaudacionTotal, 0) . " €<br>";
    



    ?>
</body>
</html>