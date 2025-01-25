<!DOCTYPE html>
<html>
<head>
    <title>DISTANCIA</title>
</head>
<body>
    <h1>Distancia entre puntos</h1>

    <?php
        $x1 = 500;
        $x2 = 1000;
        $y1 = 50;
        $y2 = 2000;
        
        $dif_x = $x2 - $x1; 
        $dif_y = $y2 - $y1;
        $distancia = sqrt(($dif_x**2) + ($dif_y**2));

        echo 'La distancia obtenida es: ' . $distancia;
    ?>
</body>
</html>