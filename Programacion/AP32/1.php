<!DOCTYPE html>
<html>
<head>
    <title>EL CRUSTACEO CRUJIENTE</title>
</head>
<body>
    <h1>“El Crustáceo Crujiente” es una empresa dedicada a ofrecer banquetes; sus tarifas son las siguientes: el coste del plato por persona es de 95.00€, 
        pero si el número de personas es mayor a 200 y menor o igual a 300, el coste es de 85.00€. Para más de 300 personas el coste por plato es de 75.00€. 
        Se requiere un algoritmo que ayude a determinar el presupuesto que se debe presentar a los clientes que deseen realizar un evento.</h1>

    <?php
    $num = $_GET['num'];
    $plato = 95;

    if($num > 20 && $num <= 300) {
        $plato = 85;
    } elseif ($num > 300) {
        $plato = 75;
    }

    $presupuesto = $num * $plato;

    echo "El resultado para $num de personas es de:". $presupuesto. " euros";
    ?>
</body>
</html>
