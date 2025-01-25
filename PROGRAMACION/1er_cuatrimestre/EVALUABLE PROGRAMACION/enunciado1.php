<?php //Numero tiradas
session_start();

// Inicialización al cargar la página
if (!isset($_SESSION['tablero'])) {
    $numeros = [1, 2, 3, 4, 5, 6];
    $colores = ['RED', 'YEL', 'GRE', 'BLU', 'BLA', 'WHI'];
    $combinaciones = [];
    
    // Genera todas las combinaciones posibles 
    generarCombinaciones($numeros, $colores, $combinaciones);
    
    // Crea el tablero inicial con las combinaciones generadas
    $_SESSION['tablero'] = generarTablero($combinaciones);
    $_SESSION['tiradas'] = 0;  // Asegúrate de que el contador empiece en 0
}

// Recuperar el tablero y el número de tiradas desde la sesión
$tablero = $_SESSION['tablero'];
$n_tiradas = $_SESSION['tiradas'];

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

    <!-- Formulario para recoger las filas y columnas de inicio y fin -->
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
        <p>Número de tiradas: <?php echo $n_tiradas; ?></p>
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

        // Validar la tirada y actualizar en caso de ser válida
        if (tiradaValida($tablero, $fila_inicial, $columna_inicial, $fila_final, $columna_final)) {
            $_SESSION['tiradas']++; // Solo incrementa el contador de tiradas
        }
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
function generarCombinaciones($numeros, $colores, &$combinaciones) {
    foreach ($numeros as $numero) {
        foreach ($colores as $color) {
            $combinaciones[] = $numero . "-" . $color;
        }
    }
}

// Generar el tablero
function generarTablero(&$combinaciones) {
    shuffle($combinaciones);
    $tablero = [];
    $indice = 0;
    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 6; $j++) {
            $tablero[$i][$j] = $combinaciones[$indice++];
        }
    }
    return $tablero;
}

// Dibujar el tablero
function dibujarTablero($tablero) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    foreach ($tablero as $fila) {
        echo "<tr>";
        foreach ($fila as $celda) {
            echo "<td style='padding: 10px;'>$celda</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Verificar si la tirada está permitida
function tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final) {
    if ($fila_inicial == $fila_final && $columna_inicial == $columna_final) {
        echo "Tirada no permitida: No se ha desplazado de la casilla.<br>";
        return false;
    }
    if ($fila_inicial == $fila_final || $columna_inicial == $columna_final) {
        return true;
    }
    echo "Movimiento no permitido, debe ser en la misma fila o columna.<br>";
    return false;
}

// Verificar si la tirada es válida
function tiradaValida(&$tablero, $fila_inicial, $columna_inicial, $fila_final, $columna_final) {
    if (!tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final)) {
        return false;
    }

    $casilla_inicial = $tablero[$fila_inicial - 1][$columna_inicial - 1];
    $casilla_final = $tablero[$fila_final - 1][$columna_final - 1];

    list($numero_inicial, $color_inicial) = explode("-", $casilla_inicial);
    list($numero_final, $color_final) = explode("-", $casilla_final);

    if ($numero_inicial == $numero_final || $color_inicial == $color_final) {
        echo "Tirada válida: Coinciden número o color.<br>";
        return true;
    } else {
        echo "Tirada no válida: No coinciden número ni color.<br>";
        return false;
    }
}
?>
