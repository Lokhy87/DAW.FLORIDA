<!DOCTYPE html>
<html>
<head>
    <title>AUTOBUSES</title>
</head>
<body>
    <h1>Una compañía de viajes cuenta con tres tipos de autobuses (A, B y C), cada uno tiene un precio por kilómetro recorrido por persona, 
        los costes respectivos son 2.0€, 2.5€ y 3.0€. Se requiere determinar el coste total y por persona del viaje considerando que cuando éste se presupuesta 
        debe haber un mínimo de 20 personas, de lo contrario el cobro se realiza en base a este número mínimo.</h1>

    <?php
    $personas = $_GET['num'];
    $tipo_bus = 'A';
    $bus_A = 2;
    $bus_B = 2.5;
    $bus_C = 3;

    $personas_cobradas = ($personas < 20) ? 20 : $personas; // Determino numero de personas 

    if ($personas >= 20 && $tipo_bus == 'A') {
        $coste_bus = $personas * $bus_A;
    } elseif ($personas >= 20 && $tipo_bus == 'B') {
        $coste_bus = $personas * $bus_B;
    } elseif ($personas >= 20 && $tipo_bus == 'C') {
        $coste_bus = $personas * $bus_C;
    } else {
        echo "Tipo de autobus no valido, seleccione otro por favor.";
    }

    $coste_por_persona = $coste_bus / $personas_cobradas;

    echo "El coste total del viaje es de: " . $coste_bus . " euros.<br>";
    echo "El coste para cada persona es de: " . $coste_por_persona . " euros.";  

    ?>
</body>
</html>