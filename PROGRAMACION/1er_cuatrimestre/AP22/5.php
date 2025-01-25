<!DOCTYPE html>
<html>
<head>
    <title>AREA</title>
</head>
<body>
    <h1>Area circulo + triangulo</h1>

    <?php
        $r = 20;
        $h = 60;
        $pi = 3.1416;
        
        $area_semicir = ($pi * ($r**2)) / 2; 
        $altura_triang = sqrt(($h**2) - ($r**2));
        $area_triang = (2 * $r * $altura_triang) /2;
        $area_total = $area_semicir + $area_triang;

        echo 'El area de la figura es: ' . $area_total;
    ?>
</body>
</html>