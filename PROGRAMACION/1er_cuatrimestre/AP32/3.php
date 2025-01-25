<!DOCTYPE html>
<html>
<head>
    <title>VIAJE ESTUDIOS</title>
</head>
<body>
    <h1>El director de una escuela está organizando un viaje de estudios, y requiere determinar cuánto debe cobrar a cada alumno y cuánto debe pagar a la 
        compañía de viajes por el servicio. La forma de cobrar es la siguiente:

            si son 100 alumnos o más, el coste por cada alumno es de 65.00€
            de 50 a 99 alumnos, el coste es de 70.00€
            de 30 a 49, de 95.00€
            si son menos de 30, el coste de la renta del autobús es de 4000.00€, sin importar el número de alumnos.
            Realiza un algoritmo que permita determinar el pago a la compañía de autobuses y lo que debe pagar cada alumno por el viaje.</h1>

    <?php
    $alumnos = $_GET['num'];

    if ($alumnos >= 100) {
        $coste_total = 65 * $alumnos;
    } elseif ($alumnos >= 50 && $alumnos < 100) {
        $coste_total = 70 * $alumnos;
    } elseif ($alumnos >= 30 && $alumnos < 50) {
        $coste_total = 95 * $alumnos;
    } elseif ($alumnos < 30) {
        $coste_total = 4000;
    }

    echo "El coste del viaja para $alumnos es de: ". $coste_total ." euros.";

    ?>
</body>
</html>