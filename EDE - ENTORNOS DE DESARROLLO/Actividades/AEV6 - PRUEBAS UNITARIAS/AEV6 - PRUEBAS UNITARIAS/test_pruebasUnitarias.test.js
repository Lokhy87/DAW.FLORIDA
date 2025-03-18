
const Ordenacion = require('./pruebasUnitarias.js')

// Test
test('Ordenar una lista desordenada', () => {
    expect(Ordenacion([40, 10, 20, 50, 30])).toEqual([10, 20, 30, 40, 50]);
});

test('Ordenar una lista en orden inverso', () => {
    expect(Ordenacion([9, 7, 5, 3, 1])).toEqual([1, 3, 5, 7, 9]);
});

test('Ordenar una lista con valores repetidos', () => {
    expect(Ordenacion([8, 2, 8, 6, 2])).toEqual([2, 2, 6, 8, 8]);
});

test('Ordenar una lista con un solo valor', () => {
    expect(Ordenacion([99])).toEqual([99]);
});

test('Ordenar una lista vacía', () => {
    expect(Ordenacion([])).toEqual([]);
});

test('Ordenar una lista con valores negativos', () => {
    expect(Ordenacion([-10, 5, 0, -3, 8])).toEqual([-10, -3, 0, 5, 8]);
});
test('Casos inesperados o errores', () => {
    expect(Ordenacion([null, 2, 3, undefined])).toThrow()
})

