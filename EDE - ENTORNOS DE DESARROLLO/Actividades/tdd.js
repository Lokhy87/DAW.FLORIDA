// Diseño y desarrollo de la prueba 
function pruebaUnitaria(a, b) {
    const resultado = suma(3, 5);
    if (resultado !== 8) {
        throw new Error("La prueba unitaria falló: se esperaba 8 pero se obtuvo " + resultado);
    }
    console.log("La prueba unitaria paso correctamente");
}

// Funcion que hace que se supera la prueba 
function suma(a, b) {
    return a + b;
}

pruebaUnitaria();

// Mejorar la prueba 
function pruebaUnitaria(a, b, resultadoEsperado) {
    const resultado = suma(3, 5);
    if (resultado !== resultadoEsperado) {
        throw new Error(`La prueba unitaria falló: se esperaba ${resultadoEsperado} pero se obtuvo ${resultado}`);
    }
    console.log(`La prueba unitaria pasó correctamente: ${a} + ${b} = ${resultado}`);
}

pruebaUnitaria(3, 5, 10);

