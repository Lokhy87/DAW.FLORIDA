<!DOCTYPE html>
<html>
<head>
    <title>GARRA PHONE</title>
</head>
<body>
    <h1>La política de precios de la compañía telefónica “Garra Phone” es que cuando se realiza una llamada, el cobro es por el tiempo que ésta dura, de tal
        forma que:

            los primeros cinco minutos cuestan 1.00€ el minuto
            los siguientes tres, 80 céntimos el minuto
            los siguientes dos minutos, 70 céntimos el minuto
            a partir del décimo minuto, 50 céntimos el minuto

            Además, se carga:

            un impuesto de 3 % cuando es domingo
            en día hábil por la mañana, 15 %
            en día hábil por la tarde, 10 %.
            Realiza un algoritmo para determinar cuánto debe pagar por cada concepto una persona que realiza una llamada.</h1>

    <?php
    // Calcular coste segun duracion de la llamada
    $minutos = $_GET['num'];
    $coste_llamada = 0;

    if ($minutos <= 5) {
        $coste_llamada = 1 * $minutos;
    } elseif ($minutos <= 8) {
        $coste_llamada = 5 * 1 + ($minutos - 5) * 0.80;
    } elseif ($minutos <= 10) {
        $coste_llamada =  5 * 1 + 3 * 0.80 + ($minutos - 8) * 0.70;
    } else {
        $coste_llamada =  5 * 1 + 3 * 0.80 + 2 * 0.70 + ($minutos - 10) * 0.50;
    }

    //Calcular impuestos segun dia y hora de la semana 
    $dia_semana = date('w');
    $hora_dia = date('H');
    $impuestos = 0;

    if ($dia_semana == 0) {
        $impuestos = 0.03;
    } elseif ($hora_dia >= 6 && $hora_dia <= 12 && $dia_semana >= 1 && $dia_semana <= 6) {
        $impuestos = 0.15;
    } elseif ($hora_dia >= 12 && $hora_dia <= 20 && $dia_semana >= 1 && $dia_semana <= 6) {
        $impuestos = 0.10;
    }

    // Calcular coste total llamada teniendo en cuenta duracion, dia y hora
    $coste_total = $coste_llamada + ($coste_llamada * $impuestos);

    echo "El coste total de la llamada de $minutos minutos, realizada el día $dia_semana a las $hora_dia:00 es de: ". $coste_total. " euros.";

    ?>
</body>
</html>