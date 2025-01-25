<!DOCTYPE html>
<html>
<head>
    <title>DNI</title>
</head>
<body>
    <h1>Crea un programa que calcule la letra de un DNI en base al número pasado. El cálculo resulta de obtener el resto de la división del número entre 23, 
        y con este número, seleccionar la letra de una lista por posición, es decir, si el número es 14, entonces la letra 14, dado que se corresponde 
        con la posición 14 de la secuencia TRWAGMYFPDXBNJZSQVHLCKE.</h1>

    <form method="POST">
        <label for="numero">Introduce el numero de tu DNI:</label>
        <input id="numero" name="numero" type="number"><br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php

    $secuencia = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        
            if(strlen($numero) == 8) {
                $resto = $numero % 23;
                $letra = $secuencia[$resto];
                echo "La letra del DNI es ". $letra. "<br>";
                echo "El numero de su DNI mas la letras es $numero - $letra";
            } else {
                echo "El numero debe tener 8 digitos";
            }
    
    }

    ?>
</body>
</html>
