/*
Implementa un script en JavaScript para que, cuando el usuario escriba el nombre o el ID de un Pokémon en un input y pulse el botón:
Se haga una petición HTTP GET a la PokéAPI para obtener los datos de ese Pokémon.
En la página se muestre una card con:
    - La imagen frontal del Pokémon
    - Su nombre
    - Su número de Pokédex (id)
    - Sus tipos (por ejemplo: electric, fire / flying, etc.)
La card debe crearse solo la primera vez.
En búsquedas posteriores, solo se actualizará el contenido (imagen, nombre, id y tipos).
Si el usuario introduce un Pokémon que no existe, deberás mostrar una alerta indicando que no se ha encontrado.
*/

// Seleccion 
let form = document.querySelector('form');
let input = document.querySelector("[name='pokemon']");
let button = document.querySelector('button');
let div = document.querySelector('.table-wrapper');

// Funcion 
const getPokemon = async (event) => {
    event.preventDefault();

    const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${input.value}`);
    const data = await response.json();
    console.log(data.types);

    if(document.querySelector('#card') === null) {
        let img = document.createElement('img');
        img.id = 'poke-img';

        let h2 = document.createElement('h2');
        h2.id = 'poke-name';

        let id = document.createElement('p');
        id.id = 'poke-id';

        let type = document.createElement('p');
        type.id = 'poke-type';

        form.appendChild(img);
        form.appendChild(h2);
        form.appendChild(id);
        form.appendChild(type);
    };
    document.querySelector('#poke-img').src = data.sprites.back_default;
    document.querySelector('#poke-name').textContent = data.name;
    document.querySelector('#poke-id').textContent = `ID: ${data.id}`;
    
    // Cuando es un array, tengo que mapearlo para poder sacarlo
    const tipos = data.types.map(t => t.type.name).join(', ');
    document.querySelector('#poke-type').textContent = `Tipos: ${tipos}`;

};

button.addEventListener('click', getPokemon);