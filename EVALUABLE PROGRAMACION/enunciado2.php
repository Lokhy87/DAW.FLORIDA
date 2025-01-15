<?php // Boton reinicio
    session_start();

    // Reiniciar el tablero
    if (isset($_POST['reiniciar'])) {
        session_unset(); // Eliminar las variables de sesión
        session_destroy(); // Destruir la sesión
        header("Location: " . $_SERVER['PHP_SELF']); // Redirigir para recargar la página
        exit();
    }

    // Inicializacion al cargar la pagina
    if (!isset($_SESSION['tablero'])) {
        $numeros = [1, 2, 3, 4, 5, 6];
        $colores = ['RED', 'YEL', 'GRE', 'BLU', 'BLA', 'WHI'];
        $combinaciones = [];
        
        // Genera ctodas las combinaciones posibles 
        generarCombinaciones($numeros, $colores, $combinaciones);
        
        // Crea el tablero inicial con las combinaciones generadas
        $_SESSION['tablero'] = generarTablero($combinaciones);
    }

    // Recuperar el tablero desde la sesión
    $tablero = $_SESSION['tablero'];
?>
<html>
<head>
    <title>ex1aEval</title>
    <style>
        .mt-4 { margin-top: 10px; }
        .mb-3 { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Examen 1a Evaluación</h1>

    <!--formulario para recoger las filas y columnas de inicio y fin-->
    <form method="post" action="" class="mt-4">
        <div class="mb-3">
            <label for="fila_inicial" class="form-label">Fila inicial</label>
            <input type="number" name="fila_inicial" id="fila_inicial" class="form-control" min="1" max="6" required>
        </div>
        <div class="mb-3">
            <label for="columna_inicial" class="form-label">Columna inicial</label>
            <input type="number" name="columna_inicial" id="columna_inicial" class="form-control" min="1" max="6" required>
        </div>
        <div class="mb-3">
            <label for="fila_final" class="form-label">Fila final</label>
            <input type="number" name="fila_final" id="fila_final" class="form-control" min="1" max="6" required>
        </div>
        <div class="mb-3">
            <label for="columna_final" class="form-label">Columna final</label>
            <input type="number" name="columna_final" id="columna_final" class="form-control" min="1" max="6" required>
        </div>
        <input type="submit" name="submit" value="Jugar" class="btn btn-primary">
        <input type="submit" name="reiniciar" value="Reiniciar" class="btn btn-secondary mt-2">
    </form>

    <?php
        if (isset($_POST["submit"])) {
            $fila_inicial = htmlspecialchars($_POST["fila_inicial"] ?? "", ENT_QUOTES);
            $columna_inicial = htmlspecialchars($_POST["columna_inicial"] ?? "", ENT_QUOTES);
            $fila_final = htmlspecialchars($_POST["fila_final"] ?? "", ENT_QUOTES);
            $columna_final = htmlspecialchars($_POST["columna_final"] ?? "", ENT_QUOTES);

            // Mostrar la selección realizada 
            echo "<div class=\"mt-4\">";
            echo "<h3>Selección realizada:</h3>";
            echo "Fila inicial: $fila_inicial<br>";
            echo "Columna inicial: $columna_inicial<br>";
            echo "Fila final: $fila_final<br>";
            echo "Columna final: $columna_final<br>";
            echo "</div>";
            echo "<br>";

            // Validar la tirada y mostrar el resultado debajo del tablero
            tiradaValida($_SESSION['tablero'], $fila_inicial, $columna_inicial, $fila_final, $columna_final);
        }
        
        // Mostrar el tablero actual
        echo "<h3>TABLERO</h3>";
        dibujarTablero($tablero);
    ?>
</body>
</html>
    
<?php
    // FUNCIONES
    
    // Generar combinaciones 
    function generarCombinaciones ($numeros, $colores, &$combinaciones) {
        foreach ($numeros as $numero) {
            foreach ($colores as $color){
                $combinaciones[] = $numero . "-" . $color;
            }
        }
    }

    // Funcion para generar el tablero
    function generarTablero ($combinaciones){
        shuffle($combinaciones); // Barajar combinaciones
        $tablero = [];
        $indices = 0;
        for ($i = 0; $i < 6; $i++){
            for ($j = 0; $j < 6; $j++) {
                $tablero[$i][$j] = $combinaciones[$indices]; // Asignar una combinacion a cada una de las celdas 
                $indices++;
            }
        }
    return $tablero;
    }

    // Funcion para dibujar el tablero
    function dibujarTablero ($tablero) {
        echo "<table border='1' style='border-collapse: collapse;'>";
        foreach ($tablero as $fila) {
            echo "<tr>"; // Comienza una nueva fila
            foreach ($fila as $celda) {
                echo "<td style='padding: 10px;'>$celda</td>"; // Cada celda dentro de una columna
            }
            echo "</tr>"; 
        }
        echo "</table>"; 
        }
       
    // Funcion comprobar si la tirada esta permitida 
    function tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final) {

        // Verificar si no hay desplazamiento
        if ($fila_inicial == $fila_final && $columna_inicial == $columna_final) {
            echo "Tirada no permitida: No se ha desplazado de la casilla.<br>";
            return false;
        }
    
        // Verificar si está en la misma fila o columna
        if ($fila_inicial == $fila_final || $columna_inicial == $columna_final) {
            echo "Tirada permitida: Está en la misma fila o columna.<br>";
            return true;
        }
    
        // Si no cumple con ninguna de las reglas
        echo "Movimiento no permitido, debe ser en la misma fila o columna.<br>";
        return false;
    }

    // Funcion comprobar si la tirada es valida
    function tiradaValida ($tablero, $fila_inicial, $columna_inicial, $fila_final, $columna_final){

        // Verifica si la tirada esta permitida
        if (!tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final)){ // Verifica si esta permitada o no
            return false;
        }

        // Obtener casillas iniciales y finales 
        $casilla_inicial = $tablero[$fila_inicial][$columna_inicial];
        $casilla_final = $tablero[$fila_final][$columna_final];

        // Separar los valores de número y color de ambas casillas
        list($numero_inicial, $color_inicial) = explode("-", $casilla_inicial);
        list($numero_final, $color_final) = explode("-", $casilla_final);

        // Validar si coinciden en numero y color
        if ($numero_inicial == $numero_final || $color_inicial == $color_final){
            echo "Tirada valida: Coinciden numero o color.<br>";
            return true;
        } else{
            echo "Tirada No valida: No coinciden numero ni color.<br>";
            return false;
        } 
    }

?>