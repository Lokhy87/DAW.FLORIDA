<!DOCTYPE html>
<html>
<head>
    <title>SUELDO</title>
</head>
<body>
    <h1>Sueldo semanal</h1>

    <?php
        $horas = 38;
        $pago = 25;
        
        $sueldo = $horas * $pago; 

        echo 'La nominal semanal es: ' . $sueldo;
    ?>
</body>
</html>
