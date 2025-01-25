<!DOCTYPE html>
<html>
<head>
    <title>FIBONACCI</title>
</head>
<body>
    <h1>Realiza un algoritmo para generar N elementos de la sucesión de Fibonacci (0, 1, 1, 2, 3, 5, 8, 13,...). El planteamiento del algoritmo correspondiente 
        se hace a partir del análisis de la sucesión, en la que se puede observar que un tercer valor de la serie está dado por la suma de los dos valores 
        previos, de aquí que se asignan los dos valores para sumar (0, 1), que dan la base para obtener el siguiente elemento que se busca.</h1>

    <?php
    $N = 10;
    $fibonacci = [0, 1];

    for ($i = 2; $i < $N; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    echo "Los primeros $N elementos de la sucesion de Fibonacci son:<br>";
    for ($i = 0; $i < $N; $i++) {
        echo "$fibonacci[$i]<br>";
    }
    ?>
</body>
</html>