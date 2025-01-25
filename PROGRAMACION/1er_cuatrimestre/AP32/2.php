<!DOCTYPE html>
<html>
<head>
    <title>VINICULTORES</title>
</head>
<body>
    <h1>La asociación de vinicultores tiene como política fijar un precio inicial al kilo de uva, la cual se clasifica en tipos A y B, y además en tamaños 1 y 2.
        Cuando se realiza la venta del producto, ésta es de un solo tipo y tamaño, se requiere determinar cuánto recibirá un productor por la uva que entrega en un embarque, considerando lo siguiente:

            Si es de tipo A, se le cargan 20 céntimos al precio/kg inicial cuando es de tamaño 1 y 30 céntimos si es de tamaño 2.
            Si es de tipo B, se rebajan 30 céntimos al precio/kg cuando es de tamaño 1, y 50 céntimos cuando es de tamaño 2.</h1>

    <?php
    $precio = $_GET['num'];
    $tipo_uva = 'A';
    $tamaño_uva = 1;

    if ($tipo_uva == 'A' && $tamaño_uva == 1) {
        $precio_kilo = $precio + 0.20;
    } elseif ($tipo_uva == 'A' && $tamaño_uva == 2) {
        $precio_kilo = $precio + 0.30;
    } elseif ($tipo_uva == 'B' && $tamaño_uva == 1) {
        $precio_kilo = $precio - 0.30;
    } elseif ($tipo_uva == 'B' && $tamaño_uva == 2) {
        $precio_kilo = $precio - 0.50;
    } else {
        echo 'El tipo o tamaño de uva no es valido, seleccione otra opcion, tipo "A" o "B", y tamaño "1" o "2".';
    }

    echo "El precio por kilo de uva en de tipo $tipo_uva y tamaño $tamaño_uva es: ". $precio_kilo . " euros";
    ?>
</body>
</html>
