<!DOCTYPE html>
<html>
<head>
    <title>REGISTRO HORAS</title>
</head>
<body>
    <h1>Una empresa tiene el registro de las horas que trabaja diariamente un empleado durante la semana (seis días) y requiere determinar el total de éstas, 
        así como el sueldo que recibirá por las horas trabajadas.</h1>

    <?php
    $horas = $_GET['num'];
    $sueldo_horas = 15;
    $dias_semana = 6;

    $total_horas = $horas * $dias_semana;

    $sueldo_total = $total_horas * $sueldo_horas;
    
        // No termino de entenderlo, creo que se puede resolver sin utilziar nada de lo anterior, pero entiendo que hay que usar lo aplicado en los otros.     
    ?>
</body>
</html>
