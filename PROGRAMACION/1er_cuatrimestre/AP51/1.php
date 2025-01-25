<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diferencia de Edad</title>
</head>

<body>
    <h1>EJERCICIO 1</h1>
    <h2>Programa que pida la edad de 2 hermanos e informe de la diferencia de edad existente entre ambos. Debes utilizar una función diferenciaEdad, 
        que reciba las dos edades y retorne en valor positivo la diferencia entre ambos.</h2>

    <form method="POST">
        <label for="edad1">Edad del primer hermano:</label>
        <input type="number" id="edad1" name="edad1" min="0" required>
        <br><br>
        <label for="edad2">Edad del segundo hermano:</label>
        <input type="number" id="edad2" name="edad2" min="0" required>
        <br><br>
        <button type="submit">Calcular Diferencia</button>
    </form>

    <?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener las edades desde el formulario
        $edad1 = (int)$_POST["edad1"];
        $edad2 = (int)$_POST["edad2"];

        // Función para calcular la diferencia de edad
        function diferenciaEdad($a, $b) { 
            return abs($a - $b);
        }

        // Calcular la diferencia
        $diferencia = diferenciaEdad($edad1, $edad2);

        // Mostrar el resultado
        echo "<h3>Resultado:</h3>";
        echo "<p>La diferencia entre $edad1 y $edad2 es: $diferencia años.</p>";
    }
    ?>
</body>
</html>
