<!DOCTYPE html>
<html>
<head>
    <title>PRODUCTOR LECHE</title>
</head>
<body>
    <h1>Pago por leche</h1>

    <?php
        $litrosDia = 400;
        $precio = 2;
        $gal = 3.785;
        
        $galonDia = $litrosDia / $gal; 
        $pago_total = $galonDia * $precio;

        echo 'El pago por la leche asciende a: ' . $pago_total;
    ?>
</body>
</html>