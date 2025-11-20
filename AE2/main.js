// --- PLANTILLA Y CONFIGURACIÓN ---
let template = document.querySelector('.card');            
const sprites = ['front_default', 'back_default', 'back_shiny', 'front_shiny'];

let showMoreBtn = document.querySelector('#render-more > button');

const FAV_KEY = 'pokemon-favorites';
let lastPokemon = null;


let pokemonList = [];
let currentIndex = 0;

// --- MODAL ---
const modal = document.querySelector('.modal');
const modalImg = modal.querySelector('.card-header > img');
const modalName = modal.querySelector('.tag');
const modalClose = modal.querySelector('.close-button');

modalClose.addEventListener('click', () => {
    modal.classList.remove('show-modal');
});


// Al pulsar el nombre del modal → guardar en favoritos
modalName.addEventListener('click', () => {
    if (!lastPokemon) return;

    const favorites = JSON.parse(localStorage.getItem(FAV_KEY) || '[]');
    const exists = favorites.some(fav => fav.name === lastPokemon.name);
    
    if (!exists) {
        favorites.push(lastPokemon);
        localStorage.setItem('pokemon-favorites', JSON.stringify(favorites));
        alert(`"${lastPokemon.name}" añadido a favoritos`);
    } else {
        alert(`"${lastPokemon.name}" ya esta en favoritos`);
    }

})

// --- MODAL FAVORITOS ---
const modals = document.querySelectorAll('.modal');
const favModal = modals[1];                            // segundo modal

const favForm = favModal.querySelector('form');
const favInput = favModal.querySelector('.input');
const favImg = favModal.querySelector('.card-header > img');
const favTag = favModal.querySelector('.tag');
const favClose = favModal.querySelector('.close-button');

// Cerrar modal de favoritos
favClose.addEventListener('click', () => {
    favModal.classList.remove('show-modal');
});

const favLink = document.querySelector('.question-link');

favLink.addEventListener('click', () => {
    favModal.classList.add('show-modal');
});

// --- FUNCIÓN QUE PINTA 3 POKÉMON ---
const renderNextThree = () => {
    const slice = pokemonList.slice(currentIndex, currentIndex + 3);

    slice.map(pokemon => {
        fetch(pokemon.url)
            .then(res => res.json())
            .then(detalle => {

                // --- ARRAY DE IMÁGENES (solo las que existen) ---
                const imagenes = sprites
                    .map(clave => detalle.sprites[clave])
                    .filter(url => url);

                // --- NUEVA CARD ---
                const nuevaCard = template.cloneNode(true);
                nuevaCard.querySelector('.card-title').textContent = detalle.name;

                // --- CARRUSEL ---
                let indice = 0;
                const photoDiv = nuevaCard.querySelector('.photo');

                const mostrarImagen = () => {
                    photoDiv.innerHTML = '';
                    const img = document.createElement('img');
                    img.src = imagenes[indice];
                    photoDiv.appendChild(img);
                };
                mostrarImagen();

                // --- BOTONES DEL CARRUSEL ---
                const btns = nuevaCard.querySelectorAll('.render-more > button');
                const btnPrev = btns[0];
                const btnNext = btns[1];

                btnPrev.addEventListener('click', () => {
                    indice = (indice - 1 + imagenes.length) % imagenes.length;
                    mostrarImagen();
                });

                btnNext.addEventListener('click', () => {
                    indice = (indice + 1) % imagenes.length;
                    mostrarImagen();
                });

                // --- AMPLIAR ---
                const ampliar = nuevaCard.querySelector('.trigger');

                ampliar.addEventListener('click', () => {
                    modalImg.src = imagenes[indice];
                    modalName.textContent = detalle.name;

                    lastPokemon = {
                        name: detalle.name,
                        img: imagenes[indice] 
                    }
                    modal.classList.add('show-modal');
                });

                // --- AÑADIMOS LA CARD AL GRID ---
                document.querySelector('.grid').appendChild(nuevaCard);
            });
    });

    // Avanzamos índice global
    currentIndex += slice.length;

    // Si ya no quedan más pokémon, ocultamos el botón
    if (currentIndex >= pokemonList.length) {
        showMoreBtn.style.display = 'none';
    }
};


// --- FUNCIÓN PRINCIPAL ---
const getpokemon = async () => {

    const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=20');
    const data = await response.json();

    pokemonList = data.results;   // guardamos TODOS
    renderNextThree();            // mostramos los 3 primeros

    template.remove();            // quitamos la card plantilla
};


// --- MOSTRAR MÁS ---
showMoreBtn.addEventListener('click', () => {
    renderNextThree();            // mostramos 3 más
});

// --- EJECUCIÓN ---
getpokemon();
