// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: obtener el avatar del primer usuario encontrado en GitHub
// -----------------------------------------------------------
const getProfile = async () => {

    // Hacemos una petición GET a la API de GitHub utilizando la función genérica getData().
    // La búsqueda 'search/users?q=JavaScript' devuelve usuarios cuyo perfil contiene la palabra "JavaScript".
    const response = await getData('https://api.github.com/search/users?q=JavaScript');

    // De entre todos los resultados (response.items), guardamos la URL del avatar
    // del primer usuario encontrado. Cada usuario tiene propiedades como login, id,
    // avatar_url, html_url, etc. En este caso necesitamos solamente avatar_url.
    let photo = response.items[0].avatar_url;

    // -----------------------------------------------------------
    // CREACIÓN DINÁMICA DE LA IMAGEN (solo si no existe ya en el DOM)
    // -----------------------------------------------------------
    // Comprobamos si existe un elemento con id="profile".
    // Si NO existe, significa que es la primera vez que se hace la petición
    // y debemos crear dinámicamente el elemento <img>.
    if (document.getElementById('profile') === null) {

        // Creamos un elemento <img> desde JavaScript.
        let img = document.createElement('img');

        // Modificamos su tamaño directamente desde JS (inline styles).
        img.style.height = '300px';
        img.style.width = '300px';

        // Le asignamos un id para poder localizarlo fácilmente posteriormente.
        img.id = 'profile';

        // Insertamos la imagen en el cuarto contenedor con la clase "table-wrapper".
        // Usamos tableWrapper[3] porque es el contenedor donde queremos mostrar el avatar.
        tableWrapper[3].appendChild(img);
    }

    // -----------------------------------------------------------
    // ASIGNAR LA IMAGEN AL SRC DEL ELEMENTO
    // -----------------------------------------------------------
    // Tanto si acabamos de crear la imagen como si ya existía,
    // aquí le asignamos la URL del avatar que hemos obtenido de la API.
    document.getElementById('profile').src = photo;
}


// -----------------------------------------------------------
// ASOCIAR EVENTO CLICK AL SEGUNDO ELEMENTO CON name="profiles"
// -----------------------------------------------------------
// profiles es una colección (HTMLCollection) obtenida con getElementsByName.
// Accedemos al segundo elemento [1], y cuando el usuario haga clic,
// ejecutamos getProfile(), que mostrará el avatar del usuario.
profiles[1].addEventListener('click', getProfile);
