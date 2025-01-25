<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>EJERCICIO 7</h1>
    <h2>Teniendo como referencia la página php.net - String Functions, investiga el funcionamiento de las funciones nativas de tratamiento de Strings y 
        realiza un programa en PHP que, en base al texto proporcionado, realice las siguientes acciones, cada uno a través de una función diferente:

        Busque una palabra concreta introducida por teclado y diga si existe o no, y en caso afirmativo, cuantas coincidencias se han encontrado
        Reemplace la palabra por su versión en mayúsculas</h2>

    <form method="POST">
        <label for="texto">Introduzca el texto a analizar:</label>
        <input type="text" id="text" name="texto" required>
        <br><br>
        <label for="palabra">Introduzca la palabra a buscar:</label>
        <input type="text" id="palabra" name="palabra" required>
        <br><br>
        <button type="submit">Comenzar analisis</button>
    </form>
    <br>

    <?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtener el texto y palabra desde formulario
        $texto = $_POST["texto"];
        $palabra = $_POST["palabra"];

        function analizarTexto($palabra, $texto){
            $coincidencias = substr_count(strtolower($texto), strtolower($palabra));
            if ($coincidencias > 0){
                echo "La palabra $palabra se encuentra en el texto<br><br>";
                $mayusculas = str_ireplace($palabra, strtoupper($palabra), $texto);
                echo "Texto modificado: <br>".$mayusculas;
            } else {
                echo "La palabra $palabra no se encuentra en el texto";
            }
        }
        analizarTexto ($palabra, $texto);
    }
    ?>
</body>