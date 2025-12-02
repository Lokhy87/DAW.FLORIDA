// Selectores basicos
const form = document.querySelector('form');
const input = form.querySelector('input[name="name"]');
const templatePhoto = document.querySelector('.photo');
const photosContainer = templatePhoto.parentElement;

const SPRITE_KEYS = ['front_default', 'back_default', 'front_shiny', 'back_shiny'];

let firstSearchDone = false;

// Crea una nueva .photo
function createPokemonPhoto(name, sprites) {
    // Obtenemos las URLs 
    const images = SPRITE_KEYS
        .map(key => sprites[key])
        .filter(Boolean);

    if (!images.length) {
        alert(`El Pokémon "${name}" no tiene sprites disponibles.`);
        return;
    }

    // Clonamos la plantilla  
    const photo = templatePhoto.cloneNode(true);

    const imgEl = photo.querySelector('.image-container img');
    const captionEl = photo.querySelector('.caption');
    const carouselButtons = photo.querySelectorAll('.carousel p');
    const prevEl = carouselButtons[0]; // Boton previo
    const nextEl = carouselButtons[1]; // Boton next

    // Estado del carrusel
    let index = 0;

    const renderImage = () => {
        imgEl.src = images[index];
        captionEl.textContent = name;
    };

    renderImage(); // pintamos la primera imagen

    // Eventos de carrusel 
    nextEl.addEventListener('click', () => {
        index = (index + 1) % images.length;
        renderImage();
    });

    prevEl.addEventListener('click', () => {
        index = (index - 1 + images.length) % images.length;
        renderImage();
    });

    // Eliminar la primmera foto
    if (!firstSearchDone) {
        templatePhoto.remove();
        firstSearchDone = true;
    }

    //Añadimos esta nueva .photo al contenedor
    photosContainer.appendChild(photo);
}

// Manejador del formulario
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const name = input.value;
    if (!name) return;

    input.value = ''; // Borrar datos del formulario

    try {
        // Petición  
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${encodeURIComponent(name)}`);

        if (!response.ok) {
            alert(`No se encontró el Pokémon "${name}".`);
            return;
        }

        const data = await response.json();

        // Crear bloque 
        createPokemonPhoto(data.name, data.sprites);

    } catch (error) {
        console.error(error);
        alert('Se ha producido un error al consultar la PokéAPI.');
    }
});

