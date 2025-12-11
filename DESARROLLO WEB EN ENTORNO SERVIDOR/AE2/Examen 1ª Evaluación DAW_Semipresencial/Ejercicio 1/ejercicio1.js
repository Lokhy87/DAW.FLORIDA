// =======================================================
// CONFIGURACIÓN GENERAL
// =======================================================

// Clave que vamos a usar en localStorage para guardar los episodios
const EPISODES_KEY = 'rm-episodes';

// --- Selección de elementos del DOM ---
// Formulario de búsqueda
const form = document.querySelector('form');
const inputName = document.querySelector('[name="name"]');

// Modal y sus elementos internos
const modal = document.querySelector('.modal');
const closeButton = document.querySelector('.close-button');
const cardBody = document.querySelector('.card-body');
const tagSpan = cardBody.querySelector('.tag');     // <span class="tag">Episodio</span>
const title = cardBody.querySelector('h4');         // <h4>Personajes</h4> (lo podemos reutilizar)

// =======================================================
// FUNCIONES AUXILIARES PARA LOCALSTORAGE
// =======================================================

/**
 * Guarda en localStorage todos los episodios.
 * episodes → array de episodios completo.
 */
function saveEpisodesToLocalStorage(episodes) {
  localStorage.setItem(EPISODES_KEY, JSON.stringify(episodes));
}

/**
 * Lee los episodios del localStorage.
 * Si no hay nada guardado, devuelve null.
 */
function getEpisodesFromLocalStorage() {
  const data = localStorage.getItem(EPISODES_KEY);
  if (!data) return null;
  return JSON.parse(data);
}

// =======================================================
// PETICIONES A RICK & MORTY API (EPISODIOS + PERSONAJES)
// =======================================================

/**
 * Obtiene TODOS los episodios de la API de Rick and Morty.
 * La API está paginada, así que vamos recorriendo "next" hasta que sea null.
 */
const fetchAllEpisodes = async () => {
  // Si ya están en localStorage, los devolvemos directamente para evitar recargar.
  const stored = getEpisodesFromLocalStorage();
  if (stored) {
    return stored;
  }

  let allEpisodes = [];
  let url = 'https://rickandmortyapi.com/api/episode';

  try {
    // Mientras exista una URL (info.next) seguimos pidiendo páginas
    while (url) {
      const response = await fetch(url);
      const data = await response.json();

      // data.results trae un array de episodios de esa página
      allEpisodes = allEpisodes.concat(data.results);

      // data.info.next es la URL de la siguiente página, o null si no hay más
      url = data.info.next;
    }

    // Guardamos todos los episodios en localStorage para futuras búsquedas
    saveEpisodesToLocalStorage(allEpisodes);
    return allEpisodes;

  } catch (error) {
    console.error('Error obteniendo episodios:', error);
    alert('Error cargando los episodios. Inténtalo más tarde.');
    return [];
  }
};


/**
 * Dado un array de URLs de personajes, devuelve un array de NOMBRES de personajes.
 * Usamos Promise.all para hacer todas las peticiones "en paralelo".
 */
const fetchCharactersNames = async (characterUrls) => {
  try {
    // Creamos un array de promesas: una por cada personaje
    const promises = characterUrls.map(url =>
      fetch(url).then(res => res.json())
    );

    // Esperamos a que se resuelvan todas las promesas
    const characters = await Promise.all(promises);

    // Devolvemos solo el nombre de cada personaje
    return characters.map(char => char.name);

  } catch (error) {
    console.error('Error obteniendo personajes:', error);
    return [];
  }
};

// =======================================================
// GESTIÓN DEL MODAL
// =======================================================

/**
 * Muestra el modal añadiendo la clase "show-modal".
 * (El CSS se encarga de visibilidad y animaciones).
 */
function openModal() {
  modal.classList.add('show-modal');
}

/**
 * Oculta el modal quitando la clase "show-modal".
 */
function closeModal() {
  modal.classList.remove('show-modal');
}

// Cerrar modal al hacer click en la X
closeButton.addEventListener('click', closeModal);

// (Opcional) Cerrar el modal haciendo click fuera del contenido
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    closeModal();
  }
});

// =======================================================
// LÓGICA PRINCIPAL DEL EJERCICIO
// =======================================================

/**
 * Maneja el envío del formulario:
 * - Lee el nombre escrito por el usuario
 * - Busca el episodio en localStorage (o lo carga si no estaba)
 * - Muestra sus datos en el modal
 * - Carga y lista los personajes del episodio
 */
const handleSearchEpisode = async (event) => {
  event.preventDefault(); // Evitamos que el formulario recargue la página

  const searchTerm = inputName.value.trim().toLowerCase();

  if (!searchTerm) {
    alert('Por favor, escribe el nombre de un episodio.');
    return;
  }

  // Obtenemos todos los episodios (de localStorage o de la API si no estaban)
  let episodes = getEpisodesFromLocalStorage();
  if (!episodes) {
    // Si no hay episodios guardados todavía, los cargamos de la API
    alert('Cargando episodios por primera vez. Vuelve a intentarlo en unos segundos.');
    episodes = await fetchAllEpisodes();
    // Tras esto ya estarán guardados en localStorage para futuras búsquedas
  }

  if (!episodes || episodes.length === 0) {
    alert('No se han podido cargar los episodios.');
    return;
  }

  // Buscamos el episodio por nombre (case-insensitive)
  // Puedes cambiar "includes" por "===" si quieres coincidencia exacta
  const episode = episodes.find(ep =>
    ep.name.toLowerCase().includes(searchTerm)
  );

  if (!episode) {
    alert('No se ha encontrado ningún episodio con ese nombre.');
    return;
  }

  // ===================================================
  // RELLENAR EL MODAL CON LOS DATOS DEL EPISODIO
  // ===================================================

  // En episode.name tenemos el nombre del episodio
  // En episode.episode tenemos el código SxxEyy (por ejemplo, S01E01)
  tagSpan.textContent = `${episode.episode} - ${episode.name}`;

  // Ajustamos el título "Personajes" por si quieres personalizarlo
  title.textContent = 'Personajes del episodio';

  // Antes de añadir la lista de personajes, borramos la anterior (si existía)
  const oldList = cardBody.querySelector('ul');
  if (oldList) {
    cardBody.removeChild(oldList);
  }

  // Creamos una nueva lista UL para los nombres de los personajes
  const list = document.createElement('ul');

  // Obtenemos nombres de personajes a partir de sus URLs
  const characterUrls = episode.characters; // Array de URLs
  const characterNames = await fetchCharactersNames(characterUrls);

  // Creamos un <li> por cada nombre de personaje
  characterNames.forEach(name => {
    const li = document.createElement('li');
    li.textContent = name;
    list.appendChild(li);
  });

  // Metemos la lista dentro del card-body
  cardBody.appendChild(list);

  // Mostramos el modal
  openModal();
};

// =======================================================
// INICIALIZACIÓN
// =======================================================

// 1) Cargar episodios nada más abrir la página (si no estaban en localStorage)
fetchAllEpisodes(); 
// No esperamos aquí con await para no bloquear la carga; 
// si el usuario busca demasiado pronto, se le avisa con un alert en handleSearchEpisode.

// 2) Asociar el evento submit del formulario a nuestra función principal
form.addEventListener('submit', handleSearchEpisode);
