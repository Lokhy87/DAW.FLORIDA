<?php
echo "<h1>EJERCICIO 8</h1>
<h2>Teniendo como referencia la página php.net - String Functions, investiga el funcionamiento de las funciones nativas de tratamiento de Strings y realiza 
un programa en PHP que, en base al texto proporcionado, calcule los siguientes datos, cada uno a través de una función diferente:

número de caracteres, sin tener en cuenta los espacios o los saltos de línea.
número de palabras.
número de frases.
número de párrafos.
número promedio de letras por palabra.
número promedio de palabras por frase.
numero promedio de frases por párrafo.
Letra moda.
palabra moda.</h2>"; 

// Texto

$texto="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam egestas tempor lacus, eu ornare erat aliquet at. Nulla arcu lectus, bibendum 
non arcu vel, fermentum mollis felis. Nam eget imperdiet justo, at tristique leo. Donec luctus lacinia dolor et suscipit. Aliquam felis nunc, fringilla 
ac metus in, tincidunt vulputate erat. Suspendisse euismod hendrerit nisl. Morbi consequat est id erat porttitor, ut posuere massa condimentum. 
Morbi vitae nisi id magna tincidunt condimentum nec vel metus. Sed ac dignissim neque. Nam nunc tellus, malesuada sit amet nulla sed, scelerisque ullamcorper 
libero. Sed venenatis eu urna ut auctor. Fusce sollicitudin id nulla luctus varius.\nUt tincidunt justo sem, et vehicula diam feugiat eu.Quisque quis 
velit ex.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.Ut erat mauris, condimentum a nulla et, iaculis 
elementum nisl.Mauris justo dui, sollicitudin sed lacus in, rhoncus volutpat mauris.Duis commodo, erat ac feugiat egestas, neque elit auctor nunc, 
quis varius eros dolor eu neque.Aliquam erat volutpat.Nunc facilisis, libero eu feugiat gravida, lorem neque gravida diam, nec gravida lacus nulla et 
ex.Integer at consequat diam.Suspendisse potenti.Nam sed nisi ultrices, consequat ante vehicula, posuere felis.Morbi vitae diam tempus, egestas neque vitae, 
maximus risus.Etiam id tempus libero.Etiam urna dui, vestibulum sit amet eleifend id, lacinia vitae mi.Aenean in nisi venenatis enim malesuada 
efficitur.\nNam non eleifend erat, vel tempor purus.Quisque consectetur, tellus id tincidunt consectetur, augue quam vehicula tortor, et laoreet quam 
magna sit amet risus.Proin sollicitudin sagittis nibh, at aliquam lorem rutrum sed.Morbi tellus magna, suscipit eget sapien ut, varius tempor velit.Etiam 
eu iaculis velit.Ut a rhoncus nisl.Quisque ut condimentum est.Phasellus auctor mauris vitae nisl vestibulum, in lacinia erat tincidunt.Vestibulum sit amet 
mi vitae purus eleifend sagittis in ac mi.Sed in mi facilisis, interdum eros non, tristique neque.Donec finibus pellentesque velit.Donec sed lorem eget 
nisl aliquam suscipit.Nunc fermentum, sapien a bibendum vehicula, mi nisl scelerisque lectus, ac euismod mi augue nec arcu.Praesent laoreet diam sit amet 
sodales efficitur.\nPhasellus nec felis sollicitudin, pulvinar risus non, euismod neque.Aenean ultricies rhoncus neque, sed tempor quam consequat vel.Donec 
finibus, eros sed tincidunt varius, eros magna ornare lectus, quis consequat ex nulla et lacus.Suspendisse vitae enim eget felis faucibus vestibulum.Maecenas 
a ligula massa.Integer nec scelerisque odio.Etiam vel aliquam neque, sit amet semper lectus.\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices 
posuere cubilia Curae; Duis iaculis leo vel pharetra ornare.Vestibulum mi nunc, sollicitudin iaculis vulputate in, egestas a orci.Class aptent taciti sociosqu 
ad litora torquent per conubia nostra, per inceptos himenaeos.Cras sit amet gravida risus.Vivamus dignissim dapibus metus, in convallis eros.Phasellus id 
purus tellus.Vestibulum rutrum libero sapien, non gravida odio varius sit amet.Curabitur tristique velit eu laoreet aliquam.Phasellus vel justo felis.";

// Funcion numero caracteres
function numeroCaracteres ($texto){
    $textoSinEspacios = str_replace(array(" ", "/n", "/r"), "", $texto); // Buscamos patron en una cadena con expresion regular
    $numeroCaracteres = strlen($textoSinEspacios);
    return $numeroCaracteres;
}
echo "El número de caracteres sin espacios ni saltos de línea es: ".numeroCaracteres($texto)."<br>";

// Funcion numero palabras 
function numeroPalabras ($texto){
    return str_word_count($texto);
}
echo "El numero de palabras que tiene el texto es:". numeroPalabras($texto)."<br>";

// Funcion numero frases 
function numeroFrases ($texto){
    preg_match_all('/[.!?]/', $texto, $coincidencias);
    return count($coincidencias[0]);
}
echo "El numero de frases que tiene el texto es:". numerofrases($texto)."<br>";

// Funcion numero parrafos
function numeroParrafo ($texto) {
    $parrafos = preg_split('/\r\n|\r|\n/', $texto); // Eliminar parrafos y saltos de linea para que no cuenten 
    return count(array_filter($parrafos, 'strlen'));
}
echo "El número de párrafos es: " . numeroParrafo($texto)."<br>";

// Funcion número promedio de letras por palabra
function promedioLetrasPalabra ($texto){
    $numCaracteres = numeroCaracteres ($texto);
    $numPalabras = numeroPalabras($texto);
    return $numCaracteres / $numPalabras;
}
echo "El promedio de letras por palabras es: ".promedioLetrasPalabra($texto)."<br>";

// Funcion número promedio de palabras por frase
function promedioPalabrasFrase ($texto){
    $numPalabras = numeroPalabras($texto);
    $numFrases = numeroFrases($texto);
    return $numPalabras / $numFrases;
}
echo "El promedio de palabras por frase es: ".promedioPalabrasFrase($texto)."<br>";


?>