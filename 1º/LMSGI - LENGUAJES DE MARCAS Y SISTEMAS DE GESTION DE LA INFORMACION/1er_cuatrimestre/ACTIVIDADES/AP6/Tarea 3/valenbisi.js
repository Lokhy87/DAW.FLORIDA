// TAREA 3 - PROGRAMACION 

'use strict';

// Utilizacion de la libreria FileSystem
const fs = require('fs');
let rawdata = fs.readFileSync('valenbisi.json');

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
console.log("Bornes: ", estaciones.features[23].properties.total);

// Aplicacion 
let estacion = "";

for (let i = 0; i <estaciones.features.length; i++)
    {
    const feature = estaciones.features[i];
    const properties = feature.properties;
    const coordinates = feature.geometry.coordinates;

    // Agregar datos de la estacion
    estacion += "Estacion: " + properties.name + "</br>";
    estacion += "Direccion: " + properties.address + "</br>";
    estacion += "Longitud: " + coordinates[0] + "</br>";
    estacion += "Latitud: " + coordinates[1] + "</br>";

    // Comprobar si los bornes son menores de 20
    if (properties.total < 20) {
        estacion += "Aviso: Esta estación tiene menos de 20 bornes (" + properties.total + ").</br>";
    }
    estacion += "</br>"; 
}

console.log(estacion);

    