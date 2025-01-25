<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros romanos</title>
</head>

<body>
    <h1>EJERCICIO 2</h1>
    <h2>Programa que tras leer un número entre 1 y 10, muestre su equivalente en número romano. Debes utilizar una función numRomano 
    // que reciba el número en formato decimal y lo devuelva en formato romano</h2>

    <form method="POST">
        <label for="numero">Numero a convertir:</label>
        <input type="number" id="numero" name="numero" min="1" max="10" required>
        <br><br>
        <button type="submit">Convertir numero cardinal a romano</button>
    </form>
    <br>

    <?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtener las edades desde el formulario
        $numero = (int)$_POST["numero"];
        
        // Funcion
        function numRomano($a) {
            if ($a == 1) {
                return "I";
            } elseif ($a == 2) {
                return "II";
            } elseif ($a == 3) {
                return "III";
            } elseif ($a == 4) {
                return "IV";
            } elseif ($a == 5) {
                return "V";
            } elseif ($a == 6) {
                return "VI";
            } elseif ($a == 7) {
                return "VII";
            } elseif ($a == 8) {
                return "VIII";
            } elseif ($a == 9) {
                return "IX";
            } elseif ($a == 10) {
                return "X";
            } else {
                return "Numero fuera de rango, seleccione otro"; 
            }
        } 
        $numeroRomano = numRomano($numero);
        echo "El número $numero en romano es:. $numeroRomano";
    }

    ?>
</body>
</html>