<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 8</title>
</head>
<body>
    <h1>Crea un script para realizar la transposición del array bi-dimensional, es decir, convertir las columnas en filas, y las filas en columnas.</h1>

    <?php
    // Definir el tamaño del array 
    $filas = 4;
    $columnas = 2;

    // Crear array
    $arrayBidim = [];

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $arrayBidim[$i][$j] = random_int(0, 100);
        }
    }

    // Enseñar array 
    echo "El array bidimensional queda: <br>";
    echo "<pre>"; 
    print_r($arrayBidim);
    echo "</pre>";

    // Transponer el array
    $arrTranspuesto = array_map(null, ...$arrayBidim);

    // Enseñar array 
    echo "Array transpuesto: <br>";
    echo "<pre>";
    print_r($arrTranspuesto);
    echo "</pre>";



    ?>
</body>
</html>