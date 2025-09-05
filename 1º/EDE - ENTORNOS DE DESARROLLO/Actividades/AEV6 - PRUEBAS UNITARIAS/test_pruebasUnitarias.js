const { default: expect } = require("expect");

const Ordenacion = requiere('./tdd.js')

// Primer test
test('Deberia ordenar correctamente una secuencia de numeros positivos y negativos', () =>{
    const resultado = Ordenacion([-2, 1, 4, 6, -5]);
    expect(resultado).toEqual([-5, -2, 1, 4, 6])
});
test('Deberia ordenar correctamente una secuencia de numeros repetidos', () =>{
    const resultado = Ordenacion([1, 3, 3, 4, 5])
    expect(resultado).toEqual([3, 1, 3, 4, 5])
});
