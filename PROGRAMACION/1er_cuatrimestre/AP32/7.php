<!DOCTYPE html>
<html>
<head>
    <title>MENORES, MAYORES O IGUALES</title>
</head>
<body>
    <h1>Se requiere un algoritmo para determinar, de N cantidades, cuántas son menores o iguales a cero y cuántas mayores a cero.</h1>

    <?php
    $N = 10; //Definir cantidad

    $menores_iguales_0 = 0;
    $mayores_0 = 0;

    for ($i = 0; $i < $N; $i++) {
        $num = rand(-1000, 1000);

        if ($num <= 0) {
            $menores_iguales_0++;
        } else {
            $mayores_0++;
        }
    echo "El numero $num: ". ($num <= 0 ? "Menor o igual a 0" : "Mayor que 0") . "<br>";
    }

    echo "De los $N numeros generados: ";
    echo "$menores_iguales_0 son menores o iguales a 0.";
    echo "$mayores_0 son mayores a 0.";
    ?>
</body>
</html>