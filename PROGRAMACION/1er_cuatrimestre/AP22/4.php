<!DOCTYPE html>
<html>
<head>
    <title>CONSTRUCTORA</title>
</head>
<body>
    <h1>Area terreno</h1>

    <?php
        $a = 40;
        $b = 80;
        $c = 30;
        
        $area_rect = $b * $c; 
        $area_triang = ($a - $c) * $b / 2;
        $area_fig = $area_rect + $area_triang;

        echo 'El area del terreno es: ' . $area_fig;
    ?>
</body>
</html>
