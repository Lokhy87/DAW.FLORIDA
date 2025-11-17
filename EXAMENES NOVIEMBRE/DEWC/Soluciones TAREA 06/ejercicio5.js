// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: obtener un usuario llamado "David" de GitHub
// y mostrar su avatar + su login + su id.
// -----------------------------------------------------------
const getDavid = async () => {

    // Petición GET a la API de GitHub usando la función genérica getData().
    // Buscamos usuarios cuyo perfil contenga el texto "David".
    const response = await getData('https://api.github.com/search/users?q=David');

    // Obtenemos la URL del avatar del primer resultado encontrado.
    let photo = response.items[0].avatar_url;

    // Obtenemos también el nombre de usuario (login) y el id dentro de GitHub.
    let login = response.items[0].login;
    let id = response.items[0].id;

    // -----------------------------------------------------------
    // CREACIÓN DINÁMICA DE ELEMENTOS (solo la primera vez)
    // -----------------------------------------------------------
    // Comprobamos si existe ya un elemento con id="david".
    // Si NO existe, es la primera vez que se hace clic, así que creamos
    // la imagen y el párrafo desde JavaScript.
    if (document.getElementById('david') === null) {

        // Creamos un elemento <img> dinámicamente.
        let img = document.createElement('img');

        // Creamos un párrafo <p> donde escribiremos login e id.
        let paragraph = document.createElement('p');

        // Añadimos id al párrafo para localizarlo posteriormente.
        paragraph.setAttribute('id', 'david_login');

        // Establecemos tamaños para la imagen.
        img.style.height = '300px';
        img.style.width = '300px';

        // Asignamos id a la imagen para poder reutilizarla en clics posteriores.
        img.id = 'david';

        // Insertamos ambos elementos dentro del contenedor tableWrapper[4].
        // tableWrapper es la colección de contenedores con class="table-wrapper".
        tableWrapper[4].appendChild(img);
        tableWrapper[4].appendChild(paragraph);
    }

    // -----------------------------------------------------------
    // ACTUALIZACIÓN DE CONTENIDO (en cada clic)
    // -----------------------------------------------------------

    // Actualizamos la imagen del usuario "David" con el avatar recibido de la API.
    document.getElementById('david').src = photo;

    // Actualizamos el párrafo con el login y el id del usuario devuelto por GitHub.
    document.getElementById('david_login').textContent =
        `Login: ${login}; Id: ${id}`;
}


// -----------------------------------------------------------
// ASOCIAR EVENTO CLICK AL TERCER ELEMENTO CON name="profiles"
// -----------------------------------------------------------
// Cuando el usuario haga clic en el elemento profiles[2],
// se ejecutará la función getDavid(), que mostrará la información.
profiles[2].addEventListener('click', getDavid);
