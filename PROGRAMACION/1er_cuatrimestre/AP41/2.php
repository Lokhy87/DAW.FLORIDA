<!DOCTYPE html>
<html>
<head>
    <title>PRODUCTOS DE LOS ELEMENTOS</title>
</head>
<body>
    <h1>Desarrollar un programa en el que teniendo dos arrays de números enteros aleatorios, se indique en pantalla el producto de los elementos que 
        ocupan la misma posición. Si los Arrays proporcionados no tienen la misma longitud, se ha de escribir en pantalla un mensaje indicativo y 
        no se realizará el proceso</h1>

    <?php
        $arr1 = [];
        for ($i = 0; $i < 5; $i++) {
            $arr1[] = rand(1,100);
        }

        $arr2 = [];
        for ($i = 0; $i < 5; $i++) {
            $arr2[] = rand(1,100);  
        }

if (count($arr1) == count($arr2)) {
            $producto = [];
            for ($i=0; $i < count($arr1); $i++) {
                $producto[] = $arr1[$i]*$arr2[$i];
            }
        echo "El producto de los arrays es: ". implode(",", $producto);
    } else{
        echo "Los arrays no tienen la misma longitud";
    }
  
    ?>
</body>
</html>
