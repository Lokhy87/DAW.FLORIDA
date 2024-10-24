<!DOCTYPE html>
<html>
<head>
    <title>VECTOR DE 5 NUMEROS</title>
</head>
<body>
    <h1>Desarrollar un programa en el que se pida al usuario un vector de 5 números enteros e indique en pantalla la media aritmética de todos 
        sus elementos</h1>

    <form method="POST">
        <label for="numero1">Introduce el primer número entero:</label>
        <input id="numero1" name="numeros[]" type="number"><br>
        <br>
        <label for="numero2">Introduce el segundo número entero:</label>
        <input id="numero2" name="numeros[]" type="number"><br>
        <br>
        <label for="numero3">Introduce el tercer número entero:</label>
        <input id="numero3" name="numeros[]" type="number"><br>
        <br>
        <label for="numero4">Introduce el cuarto número entero:</label>
        <input id="numero4" name="numeros[]" type="number"><br>
        <br>
        <label for="numero5">Introduce el quinto número entero:</label>
        <input id="numero5" name="numeros[]" type="number"><br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $numeros = $_POST['numeros'];
    
        $suma = 0;
        foreach ($numeros as $numero) {
            $suma += $numero; 
        }
    
        $media = $suma / count($numeros); // Dividir entre el número de elementos
    
        echo "La media aritmética es: " . $media;
    }
    ?>
</body>
</html>
