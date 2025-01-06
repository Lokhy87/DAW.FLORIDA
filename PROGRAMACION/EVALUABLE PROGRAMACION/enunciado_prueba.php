<?php
session_start();
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

    <!--Formulario para recoger las filas y columnas de inicio y fin-->
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
    </form>

    <?php
        // Si no existe un tablero en la sesión, generarlo
        if (!isset($_SESSION['tablero'])) {
            $numeros = [1, 2, 3, 4, 5, 6];
            $colores = ['RED', 'YEL', 'GRE', 'BLU', 'BLA', 'WHI'];
            $combinaciones = [];

            // Función para generar combinaciones
            function generarCombinaciones($numeros, $colores, &$combinaciones) {
                foreach ($numeros as $numero) {
                    foreach ($colores as $color) {
                        $combinaciones[] = $numero . "-" . $color;
                    }
                }
            }

            // Generar combinaciones
            generarCombinaciones($numeros, $colores, $combinaciones);

            // Función para generar el tablero
            function generarTablero($combinaciones) {
                shuffle($combinaciones); // Barajar combinaciones
                $tablero = [];
                $indices = 0;
                for ($i = 0; $i < 6; $i++) {
                    for ($j = 0; $j < 6; $j++) {
                        $tablero[$i][$j] = $combinaciones[$indices];
                        $indices++;
                    }
                }
                return $tablero;
            }

            // Guardar tablero en sesión
            $_SESSION['tablero'] = generarTablero($combinaciones);
        }

        // Recuperar el tablero desde la sesión
        $tablero = $_SESSION['tablero'];

        // Función para dibujar el tablero
        function dibujarTablero($tablero) {
            echo "<h3>TABLERO</h3>";
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

        // Mostrar el tablero antes de mostrar el resultado
        dibujarTablero($tablero);

        // Mostrar la selección realizada y validar la tirada después de mostrar el tablero
        if (isset($_POST["submit"])) {
            // Obtener los valores del formulario
            $fila_inicial = htmlspecialchars($_POST["fila_inicial"] ?? "", ENT_QUOTES) - 1;
            $columna_inicial = htmlspecialchars($_POST["columna_inicial"] ?? "", ENT_QUOTES) - 1;
            $fila_final = htmlspecialchars($_POST["fila_final"] ?? "", ENT_QUOTES) - 1;
            $columna_final = htmlspecialchars($_POST["columna_final"] ?? "", ENT_QUOTES) - 1;

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

        // Función para comprobar si la tirada está permitida
        function tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final) {
            if ($fila_inicial == $fila_final || $columna_inicial == $columna_final) {
                echo "Tirada permitida: Está en la misma fila o columna.<br>";
                return true;
            } else {
                echo "Movimiento no permitido, debe ser en la misma fila o columna.<br>";
                return false;
            }
        }

        // Función para comprobar si la tirada es válida
        function tiradaValida($tablero, $fila_inicial, $columna_inicial, $fila_final, $columna_final) {
            if (!tiradaPermitida($fila_inicial, $columna_inicial, $fila_final, $columna_final)) { // Verifica si está permitida o no
                return false;
            }

            // Obtener casillas iniciales y finales
            $casilla_inicial = $tablero[$fila_inicial][$columna_inicial];
            $casilla_final = $tablero[$fila_final][$columna_final];

            // Separar los valores de número y color de ambas casillas
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
</body>
</html>
