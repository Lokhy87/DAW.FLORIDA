<!DOCTYPE html>
<html>
<head>
    <title>AREA</title>
</head>
<body>
    <h1>Area circunferencia</h1>

    <?php
        $radio = 50;
        $pi = 3.1416;
        

        $area_cir = $pi * ($radio**2);
        
        echo 'El area del circulo es: ' . $area_cir;
    ?>
</body>
</html>