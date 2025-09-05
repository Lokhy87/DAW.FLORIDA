// Mecanismo de ordenacion ascendente
 function Ordenacion(secuencia) {

    // Indices i y K; auxiliar para intercambio 
    var i, k, aux; 

    // Mostramos por consola la secuencia tal como llega
    console.log(secuencia);

    // Bucle de ordenacion
    for (k = 1; k < secuencia.length; k++) {
        for (i = 0; i < secuencia.length; i++) {
            if (secuencia[i] > secuencia[i + 1]) {

                // Intercambio enret posicion i y la posterior
                aux = secuencia[i];
                secuencia[i] = secuencia[i + 1];
                secuencia[i + 1] = aux;
            }
        }
    }

    // Mostramos por consola la secuencia ordenada
    console.log(secuencia);
    return secuencia;
}

// Llamada a la funcion 
var ejemplo = [-2, 1, 4, 6, -5]
resultado = Ordenacion(ejemplo); 

