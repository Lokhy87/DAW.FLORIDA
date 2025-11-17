//Haz una petición a la PokéAPI para obtener un Pokémon y muestra el resultado por consola
let button = document.querySelector("[name='poke']");
let body = document.querySelector('body');

const getPokemon = async() => {
    const response = await fetch('https://pokeapi.co/api/v2/pokemon/pikachu');
    
    const data = await response.json();
    // console.log(data);

    let photo = data.sprites.front_default; // URL de la foto

    if(document.querySelector('#pokemon') === null){
        let img = document.createElement('img');
        img.id = 'pokemon';
        let p = document.createElement('p');
        p.id = 'pokemon-name';
        body.appendChild(img);
        body.appendChild(p);
    }
    document.querySelector('#pokemon').src = photo // Aqui transformo la url donde esta almacenada la foto(string) y la paso a img
    document.querySelector('#pokemon-name').textContent = data.name;
}

button.addEventListener('click', getPokemon);
