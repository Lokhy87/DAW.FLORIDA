// Seleccionamos elementos del DOM
const $grid = document.querySelector('div.grid'); // Contenedor principal donde se renderizarán las cartas.
const $btn_more = document.querySelector("#render-more") // Botón para cargar más elementos (aunque su funcionalidad no está completamente implementada en el código visible, se selecciona).
const $modal = document.getElementsByClassName('modal') // El elemento principal del modal (es un HTMLCollection, se accede con [0]).
const $close_btn = document.querySelector("body > div:nth-child(3) > div > span") // El botón específico para cerrar el modal.
const $modal_container = document.querySelector("body > div:nth-child(3) > div > div") // El contenedor dentro del modal donde se insertará el contenido dinámico (la carta).

$grid.innerHTML = "" // Limpia el contenido inicial del contenedor principal (la cuadrícula) antes de empezar a renderizar.

// Variables de la aplicación
let index = 10 // Almacena un número que probablemente se use para limitar la cantidad de Pokémon a cargar inicialmente (aunque se llama con '3' más abajo).

// Función para generar elementos HTML de forma simplificada
const elmt = (tag, className) => {
    const e = document.createElement(tag); // Crea el elemento (ej: <div>, <img>).
    className && e.classList.add(className); // Si se proporciona un className, se lo añade.
    return e;
};

// Función para generar cartas de Pokémon con su estructura y contenido
function createCard(name,url) {
    // 1. Creación de todos los elementos necesarios (divs, img, h2, buttons)
    const card = elmt("div","card");
    const photo = elmt("div","photo");
    const img = elmt('img')
    // ... otros elementos de la estructura
    const card_title = elmt("h2","card-title");
    const trigger = elmt('div','trigger') // Elemento para "Ampliar"

    // 2. Asignación de contenido y atributos dinámicos
    card_title.textContent = name; // Nombre del Pokémon
    img.src = url // URL de la imagen del Pokémon
    // ... contenido de botones y trigger
    trigger.textContent = "Ampliar" 

    // 3. Montaje de la estructura (AppendChilds)
    photo.appendChild(img)
    // ... ensamblaje de la carta
    footer.appendChild(titles);
    card.appendChild(photo);
    card.appendChild(footer);
    card.appendChild(btns)
    
    // 4. Asignación de Event Listener
    // Cuando se hace clic en 'Ampliar', se llama a openModal() con el nombre y URL de la carta.
    trigger.addEventListener('click', ()=> openModal(name, url))

    return card; // Devuelve el objeto card completo
}


// Función para obtener Pokémon de la API y renderizarlos
const getPokemons = (index) => {
  // Primer fetch: Obtiene una lista de Pokémon (limitada por 'index', ej: 3)
  fetch("https://pokeapi.co/api/v2/pokemon?limit=" + index)
  .then(res => res.json()) // Convierte la respuesta a formato JSON
  .then(data => {
    // Itera sobre la lista de resultados (data.results)
    data.results.forEach(p => {
      // Segundo fetch (Anidado): Obtiene los detalles de CADA Pokémon (incluyendo la URL de la imagen)
      fetch(p.url)
        .then(res => res.json())
        .then(pokemon => {
          // Crea la carta con el nombre y la imagen frontal por defecto
          const card = createCard(pokemon.name, pokemon.sprites.front_default);
          // Añade la carta al contenedor principal (la cuadrícula)
          $grid.appendChild(card);
        });
    });
  });

}

getPokemons(3) // Llama a la API para obtener y renderizar las primeras 3 cartas.


// Asigna un Event Listener al botón de cerrar modal
$close_btn.addEventListener('click', ()=> closeModal())

// Función para abrir modal con contenido dinámico
function openModal(name, url) {
    // Si ya existe un contenido anterior en el modal, lo elimina primero
    if($modal_container.firstElementChild){
      $modal_container.removeChild($modal_container.firstElementChild)
    }
    // Crea una nueva carta (la misma estructura) para mostrar en el modal
    const card = createCard(name, url); 
    $modal_container.appendChild(card)
    
    // Muestra el modal añadiendo la clase CSS 'show-modal'
    $modal[0].classList.add("show-modal");
}

// Función para cerrar modal
function closeModal() {
    // Oculta el modal eliminando la clase CSS 'show-modal'
    $modal[0].classList.remove("show-modal");
}