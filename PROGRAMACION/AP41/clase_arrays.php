<!DOCTYPE html>
<html>
<head>
    <title>EJEMPLOS SENCILLOS ARRAYS</title>
</head>
<body>
    <h1>EJEMPLOS SENCILLOS ARRAYS</h1>
 
    <?php
 
        echo "ENCONTRAR UN NÚMERO<br>";
        //Ejemplo uni-dimensional indexado
        //Array donde se muestran los números de la lotería de Navidad.
        //Encuentra un número en el array mediante un bucle for.
        $numeros = [12345, 67890, 54321, 98765]; //array de números
        $numero = 54321; //número a buscar

        for ($i = 0; $i < count($numeros); $i++) {
            if ($numero == $numeros[$i]) {
                echo "Tu numero ha sido premiado";
            }
        }

        
        echo "_<br>";
        echo "ENCONTRAR UN NÚMERO<br>";
        //Ejemplo uni-dimensional indexado
        //Array donde se muestran los números de la lotería de Navidad.
        //Encuentra un número en el array mediante un bucle foreach.
        $numeros = [12345, 67890, 54321, 98765]; //array de números
        $numero = 54321; //número a buscar

        foreach ($numeros as $data) {
            if ($numero == $data) {
                echo "Tu numero ha sido premiado";
            }
        }
      
        echo "_<br>";
        echo "PROFESOR ENROLLADO<br>";
        //Ejemplo uni-dimensional indexado
        //Array donde se muestran las notas de los alumnos de clase.
        //El examen ha ido fatal y el profesor ha decidido aumentar un punto a cada alumno.
        $notas = [5, 6, 7, 8, 9]; //array de notas
        var_dump($notas);   

        foreach ($notas as $data){
            $data++;
            echo "$data";
        }

        for ($i = 0; $i < count($notas);$i++ ){
            $notas[$i]+= 1;
        }    
        echo "<br>";
       

        echo "_<br>";
        echo "MINUTOS POR PARTIDO<br>";
        //Ejemplo uni-dimensional indexado
        //Array donde se muestran los minutos jugados por un jugador por partido.
        //Cada posición del array corresponde a un partido.
        //Saca los minutos totales, la media de minutos y cuántos partidos no ha jugado.
        $partidos = [0, 15, 30, 45]; //array de minutos jugados por partido
        $minutosTotales = 0;
        $partidosNoJugados = 0;

        foreach ($partidos as $minutos){
            $totalminutos += $minutos;
            if ($minutos == 0){
                $partidosNoJugados += 1;
            }
        }
        echo "Ha jugado un total de $totalminutos con una media de ". $totalminutos / count($partidos). " y no ha jugado $partidosNoJugados partido<br>";
       

        echo "_<br>";      
        echo "MARCAS POR AÑO DE SALTO DE LONGITUD<br>";
        //Ejemplo uni-dimensional asociativo.
        //Array donde se muestran las mejores marcas del año de un saltador de longitud.
        //Cada posición del array corresponde a una año.
        //Obtén el año donde hace la mejor marca, la marca de ese año. Saca también la media de todos los años
        $anyos = ['2010'=>7.57, '2011'=>7.34, '2012'=>8.03, '2013'=>7.97]; //array de marcas por año
        $mejorMarca = 0;
        $mejorAnyo = '';
        $num = count($anyos);
        $total = 0;

        foreach ($anyos as $any => $marca){
            $total += $marca;
            if ($marca > $mejorMarca){
                $mejorMarca = $marca;
                $mejorAnyo = $anyo;
            }
        }
        echo "La mejor marca de $mejorMarca la hizo en e año $mejorAnyo<br>";
        echo "La media marca de". $total/$num ."<br>";
      

        echo "_<br>";
        echo "MINUTOS POR PARTIDO<br>";
        //Ejemplo bi-dimensional indexado
        //Array donde se muestran los minutos jugados por una jugadora por partido.  
        //Cada posición del array corresponde a un partido y a una jugadora.
        //Saca de cada jugadora los minutos totales, la media de minutos y cuántos partidos no ha jugado.
        $partidos = [ //array de minutos jugados por partido y jugadora
            [0, 15, 30, 45],
            [45, 23, 45, 2],
            [0, 42, 86, 70],
            [86, 90, 0, 0]
        ];
        $minutosTotales = [0, 0, 0, 0];
        $partidosNoJugados = [0, 0, 0, 0];
        $media = [0, 0, 0, 0];

        for ($i = 0; $i < count($partidos); $i++) {
            for ($j = 0; $j < count($partidos[$i]);$j++){
                echo "$partidos[$i][$j] "
            }
        }


      
        echo "_<br>";
        echo "NOTAS POR ASIGNATURAS<br>";
        //Ejemplo bi-dimensional asociativo.
        //Array donde se muestran las notas de varios alumnos y alumnas por asignatura.
        //Cada posición del array corresponde a una asignatura y a un alumno o alumna.
        //Saca de cada alumno o alumna la nota media y cuántas asignaturas ha suspendido.
        $notas = [ //array de notas por asignatura y alumno
            'Juan' => ['Matemáticas' => 5, 'Lengua' => 6, 'Inglés' => 7],
            'María' => ['Matemáticas' => 4, 'Lengua' => 5, 'Inglés' => 6],
            'Pedro' => ['Matemáticas' => 6, 'Lengua' => 7, 'Inglés' => 8]
        ];
        $media = [];
        $suspensos = [];
       
 
    ?>
</body>
</html>