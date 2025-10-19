// Variables globales 
let botones = document.querySelectorAll('.category');
let desc = document.getElementsByClassName('description')[0];
let nombre = desc.querySelector('h2');
let actor = desc.querySelector('h3');
let titulo = document.querySelector('.cat');

// Arrays
// Series
let series = [
{
    nombre: 'Los Soprano',
    url: 'https://www.econlib.org/wp-content/uploads/2019/04/sopranos-1024x576.jpg',
    personajes: [
        {nombre: 'Tony Soprano', actor: 'James Gandolfini'},
        {nombre: 'Carmela Soprano', actor: 'Edie Falco'},
        {nombre: 'Anthony Jr', actor: 'Robert Iler'}
    ]
},
{
    nombre: 'The Wire',
    url: 'https://imgs.search.brave.com/QukqBrAGyRPyt6iIP886ljIwwODMGvqierAaI7vJW_4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjEtQW55ZkpwV0wu/anBn',
    personajes: [
        {nombre: 'Omar', actor: 'Michael K. Williams'},
        {nombre: 'McNulty', actor: 'Dominic West'},
        {nombre: 'Stringer Bell', actor: 'Idris Elba'}
    ]
},
{
    nombre: 'Seinfeld',
    url: 'https://imgs.search.brave.com/wXh3Q1sbIIedQOpfrFvLEEw4L7CDQ98lv3BVkJkyXAM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL00v/TVY1Qk1tUmpOalpq/TjJJdE4yRmtZaTAw/WkRnMExXRXhOMkV0/TVRVMk9EVXdOV1Ux/TTJOaFhrRXlYa0Zx/Y0djQC5qcGc',
    personajes: [
        {nombre: 'Jerry', actor: 'Jerry Seinfeld'},
        {nombre: 'George', actor: 'Jason Alexander'},
        {nombre: 'Kramer', actor: 'Michael Richards'}
    ]
}
];
// Peliculas 
let peliculas = [
{
    nombre: 'Avengers',
    url: 'https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/9730bbaa-cf9e-426f-88b7-4725c69b4dc0/compose?aspectRatio=1.78&format=webp&width=1200',
    personajes: [
        {nombre: 'Iron Man', actor: 'Robert Downey Jr.'},
        {nombre: 'Captain America', actor: 'Chris Evans'},
        {nombre: 'Thor', actor: 'Chris Hemsworth'}
    ]
},
{
    nombre: 'Avatar',
    url: 'https://disney.images.edge.bamgrid.com/ripcut-delivery/v2/variant/disney/4e0ee81e-104d-46e4-b89d-287f81d70498/compose?aspectRatio=1.78&format=webp&width=1200',
    personajes: [
        {nombre: 'Jake Sully', actor: 'Sam Worthington'},
        {nombre: 'Neytiri', actor: 'Zoe Saldana'},
        {nombre: 'Colonel Miles Quaritch', actor: 'Stephen Lang'}
    ]
},
{
    nombre: 'The Matrix',
    url: 'https://sm.ign.com/t/ign_es/screenshot/default/1999-movie-the-matrix-1920x1080_thdv.1280.jpg',
    personajes: [
        {nombre: 'Neo', actor: 'Keanu Reeves'},
        {nombre: 'Trinity', actor: 'Carrie-Anne Moss'},
        {nombre: 'Morpheus', actor: 'Laurence Fishburne'}
    ]
}
];

// Variables Actuales e Indices 
let serieActual = series[0];
let peliculaActual = peliculas[0];

let indiceSerie = 0;
let indicePeliculas = 0;
let indice = 0;

let categoriaActual = 'series';

// Seleccion 
botones.forEach(boton => {
    boton.addEventListener('click', function() {
        console.log('Has hecho click en: ', boton.textContent);       
    // Series
    if (boton.textContent === 'Series') {
        categoriaActual = 'series';
        nombre.textContent = serieActual.personajes[0].nombre 
        actor.textContent = serieActual.personajes[0].actor
        titulo.textContent = serieActual.nombre;
        document.querySelector('.img img').src = serieActual.url;
    // Peliculas 
    } else if (boton.textContent === 'Películas') {
        categoriaActual = 'peliculas';
        nombre.textContent = peliculaActual.personajes[0].nombre;
        actor.textContent = peliculaActual.personajes[0].actor;
        titulo.textContent = peliculaActual.nombre;
        document.querySelector('.img img').src = peliculaActual.url;
    }
    })
})

// Botones interiores 
let botonesInterior = document.querySelectorAll('.one .book a');

// Anterior
botonesInterior[0].addEventListener('click', function() {
    indice--;
    // Series
    if (categoriaActual == 'series') {
        if (indice >= serieActual.personajes.length)
            indice = 0;
        if (indice < 0)
            indice = serieActual.personajes.length - 1; 
        nombre.textContent = serieActual.personajes[indice].nombre 
        actor.textContent = serieActual.personajes[indice].actor
    // Peliculas 
    } else if (categoriaActual == 'peliculas') {
        if (indice >= peliculaActual.personajes.length)
            indice = 0;
        if (indice < 0)
            indice = peliculaActual.personajes.length - 1; 
    
        nombre.textContent = peliculaActual.personajes[indice].nombre 
        actor.textContent = peliculaActual.personajes[indice].actor
    }
})

// Siguiente
botonesInterior[1].addEventListener('click', function() {
    indice++
    // Series
    if (categoriaActual == 'series') {
        if (indice >= serieActual.personajes.length)
            indice = 0;
        if (indice < 0)
            indice = serieActual.personajes.length - 1;     
        nombre.textContent = serieActual.personajes[indice].nombre 
        actor.textContent = serieActual.personajes[indice].actor
    // Peliculas 
    } else if (categoriaActual == 'peliculas') {
        if (indice >= peliculaActual.personajes.length)
            indice = 0;
        if (indice < 0)
            indice = peliculaActual.personajes.length - 1;    
        nombre.textContent = peliculaActual.personajes[indice].nombre 
        actor.textContent = peliculaActual.personajes[indice].actor
    }
})

// Botones exteriores
let botonesExterior = document.querySelectorAll('.series > .book a');

// Anterior
botonesExterior[0].addEventListener('click', function() {
    // Series
    if (categoriaActual == 'series') {
        indiceSerie--;
        if (indiceSerie < 0)
            indiceSerie = series.length - 1; 
        serieActual = series[indiceSerie];
        indice = 0; 
        nombre.textContent = serieActual.personajes[indice].nombre ;
        actor.textContent = serieActual.personajes[indice].actor;
        titulo.textContent = serieActual.nombre;
        document.querySelector('.img img').src = serieActual.url;
    // Peliculas
    } else if (categoriaActual == 'peliculas') {
            indicePeliculas--;
        if (indicePeliculas < 0)
            indicePeliculas = peliculas.length - 1; 
        peliculaActual = peliculas[indicePeliculas];
        indice = 0; 
        nombre.textContent = peliculaActual.personajes[indice].nombre ;
        actor.textContent = peliculaActual.personajes[indice].actor;
        titulo.textContent = peliculaActual.nombre;
        document.querySelector('.img img').src = peliculaActual.url;
    }

})

// Siguiente
botonesExterior[1].addEventListener('click', function() {
    // Series
    if (categoriaActual === 'series') {
        indiceSerie++
        if (indiceSerie >= series.length)
            indiceSerie = 0;
        serieActual = series[indiceSerie];
        indice = 0;  
        nombre.textContent = serieActual.personajes[indice].nombre; 
        actor.textContent = serieActual.personajes[indice].actor;
        titulo.textContent = serieActual.nombre;
        document.querySelector('.img img').src = serieActual.url;
    // Peliculas 
    } else if (categoriaActual === 'peliculas') {
        indicePeliculas++;
        if (indicePeliculas >= peliculas.length)
            indicePeliculas = 0; 
    peliculaActual = peliculas[indicePeliculas];
    indice = 0; 
    nombre.textContent = peliculaActual.personajes[indice].nombre ;
    actor.textContent = peliculaActual.personajes[indice].actor;
    titulo.textContent = peliculaActual.nombre;
    document.querySelector('.img img').src = peliculaActual.url;
    }
})









