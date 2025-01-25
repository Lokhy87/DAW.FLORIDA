<!DOCTYPE html>
<html>
<head>
    <title>NOTA FINAL</title>
</head>
<body>
    <h1>Promedio de notas </h1>

    <?php
        $nota1 = 6;
        $nota2 = 5;
        $nota3 = 8;
        $nota4 = 4;

        $suma_notas = $nota1 + $nota2 + $nota3 + $nota4;
        $promedio_notas = $suma_notas / 4;

        echo 'La nota media es: ' . $promedio_notas;
    ?>
</body>
</html>
