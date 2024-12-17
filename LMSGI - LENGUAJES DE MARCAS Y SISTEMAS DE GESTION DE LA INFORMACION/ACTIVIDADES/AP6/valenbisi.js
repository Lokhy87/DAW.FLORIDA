// TAREA 3 - PROGRAMACION 

'use strict';

// Utilizacion de la libreria FileSystem
const fs = require('fs');
let rawdata = fs.readFileSync('valencbisi.json');

// Carga del fichero en un objeto JSON de JavaScript
let estaciones = JSON.parse(rawdata);

// Visualizacion de todo el conjunto de datos 
console.log(estaciones);

// Visualizacion de las caracteristicas de la primera estacion 
console.log(estaciones.features[0]);

// Viaualizacion de las coordenadas (posicion de la estacion 11)
console.log('Coordenada X: ', estaciones.features[10].geometry.coordinates[0]);
console.log('Coordenada Y: ', estaciones.features[10].geometry.coordinates[1]);

// Visualizacion del total de bornes de la estacion 24
console.log("Bornes: ", estaciones.features[23]. properties.total);

// Aplicacion 
