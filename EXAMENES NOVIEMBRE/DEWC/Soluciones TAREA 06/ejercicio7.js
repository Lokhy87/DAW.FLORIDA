// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: buscar usuarios en GitHub usando un término introducido
// por el usuario, seleccionar uno mediante posición y mostrar su avatar + datos.
// -----------------------------------------------------------
const getDevelopers = async (event) => {

    // event.preventDefault() evita que el formulario recargue la página.
    // Es obligatorio cuando trabajamos con formularios y gestionamos la
    // lógica en JavaScript.
    event.preventDefault();

    // Obtenemos el término de búsqueda que introduce el usuario en el campo
    // name="search_term". Como getElementsByName devuelve una colección,
    // accedemos al primer elemento con [0].
    let searchTerm = document.getElementsByName('search_term')[0].value;

    // Obtenemos la posición seleccionada por el usuario en el segundo campo
    // name="position". Como es texto, lo convertimos a número con parseInt.
    let position = parseInt(document.getElementsByName('position')[1].value);
    
    // Realizamos una petición GET a la API de GitHub utilizando la función genérica getData().
    // Usamos interpolación de strings (`${searchTerm}`) para construir dinámicamente
    // la URL de la API en función de lo que haya escrito el usuario.
    const response = await getData(`https://api.github.com/search/users?q=${searchTerm}`);

    // Obtenemos avatar, login y id del usuario que está en la posición indicada por el usuario.
    let photo = response.items[position].avatar_url;
    let login = response.items[position].login;
    let id = response.items[position].id;

    // -----------------------------------------------------------
    // CREACIÓN DINÁMICA DE ELEMENTOS (solo la primera vez)
    // -----------------------------------------------------------
    // Comprobamos si existe ya la imagen con id="developers".
    // Si NO existe, creamos dinámicamente el <img> y el párrafo <p>.
    if (document.getElementById('developers') === null) {

        // Crear elemento <img>.
        let img = document.createElement('img');

        // Crear elemento <p> donde aparecerá login e id.
        let paragraph = document.createElement('p');

        // Asignamos un id al párrafo para poder actualizarlo después.
        paragraph.setAttribute('id', 'developers_login');

        // Modificamos el tamaño de la imagen con estilos CSS.
        img.style.height = '300px';
        img.style.width = '300px';

        // Damos un id a la imagen para reutilizarla en siguientes clics.
        img.id = 'developers';

        // Insertamos ambos elementos dentro de tableWrapper[6],
        // que es el contenedor donde queremos mostrar los resultados.
        tableWrapper[6].appendChild(img);
        tableWrapper[6].appendChild(paragraph);
    }

    // -----------------------------------------------------------
    // ACTUALIZACIÓN DE CONTENIDO (se ejecuta en cada búsqueda)
    // -----------------------------------------------------------

    // Actualizamos la imagen con el avatar del usuario seleccionado.
    document.getElementById('developers').src = photo;

    // Actualizamos el párrafo con login e id.
    document.getElementById('developers_login').textContent =
        `Login: ${login}; Id: ${id}`;
}


// -----------------------------------------------------------
// ASOCIAR EVENTO SUBMIT AL SEGUNDO FORMULARIO
// -----------------------------------------------------------
// form es una colección (HTMLCollection) obtenida con getElementsByTagName.
// Accedemos al formulario form[1] y capturamos el evento submit.
// Cuando se envíe el formulario, ejecutamos getDevelopers(event).
form[1].addEventListener('submit', (event) => getDevelopers(event));
