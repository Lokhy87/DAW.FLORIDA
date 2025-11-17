// Seleccionamos todos los elementos <form> del documento.
// getElementsByTagName devuelve una colección (HTMLCollection),
// por eso cuando accedamos a uno lo haremos con un índice: form[0].
let form = document.getElementsByTagName('form');


// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: buscar varios usuarios llamados "David"
// y mostrar uno según la posición indicada por el usuario.
// -----------------------------------------------------------
const getDavids = async (event) => {

    // event.preventDefault() evita que el formulario recargue la página
    // (comportamiento por defecto del submit). Es obligatorio cuando
    // trabajamos con formularios y queremos procesar los datos con JavaScript.
    event.preventDefault();

    // Hacemos una petición GET a la API de GitHub con la función genérica getData().
    // La búsqueda 'q=David' devuelve una lista de usuarios cuyo perfil contiene ese nombre.
    const response = await getData('https://api.github.com/search/users?q=David');

    // Obtenemos del formulario el valor indicado por el usuario.
    // document.getElementsByName devuelve una colección, así que usamos [0].
    // Como el valor viene como string, usamos parseInt para convertirlo en número.
    let position = parseInt(document.getElementsByName('position')[0].value);

    // Usamos esa posición para elegir un elemento concreto dentro del array items.
    let photo = response.items[position].avatar_url;
    let login = response.items[position].login;
    let id = response.items[position].id;


    // -----------------------------------------------------------
    // CREACIÓN DINÁMICA DE LOS ELEMENTOS (solo la primera vez)
    // -----------------------------------------------------------
    // Comprobamos si ya existe una imagen con id="davids".
    // Si NO existe, significa que es la primera vez que se usa el formulario,
    // así que creamos la imagen y el párrafo desde JavaScript.
    if (document.getElementById('davids') === null) {

        // Creamos el elemento <img>.
        let img = document.createElement('img');

        // Creamos un <p> para mostrar login e id.
        let paragraph = document.createElement('p');

        // Le damos un id al párrafo para poder actualizarlo después.
        paragraph.setAttribute('id', 'davids_login');

        // Ajustamos tamaño de la imagen.
        img.style.height = '300px';
        img.style.width = '300px';

        // Le asignamos id a la imagen para poder reutilizarla.
        img.id = 'davids';

        // Insertamos los elementos creados dentro del contenedor tableWrapper[5].
        // Este es el div donde queremos mostrar la información.
        tableWrapper[5].appendChild(img);
        tableWrapper[5].appendChild(paragraph);
    }


    // -----------------------------------------------------------
    // ACTUALIZACIÓN DE LA IMAGEN Y EL TEXTO (cada vez que se envía el formulario)
    // -----------------------------------------------------------

    // Actualizamos la imagen seleccionada.
    document.getElementById('davids').src = photo;

    // Actualizamos el párrafo con el login y el id del usuario seleccionado.
    document.getElementById('davids_login').textContent =
        `Login: ${login}; Id: ${id}`;
};


// -----------------------------------------------------------
// ASOCIAR EVENTO SUBMIT AL FORMULARIO
// -----------------------------------------------------------
// Capturamos el evento submit del primer formulario (form[0]).
// Llamamos a getDavids(event) para procesar los datos introducidos
// sin que el formulario recargue la página.
form[0].addEventListener('submit', (event) => getDavids(event));
