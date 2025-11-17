// Seleccionamos todos los elementos que tengan el atributo name="profiles".
// getElementsByName devuelve una colección (HTMLCollection),
// por eso cuando queramos usar el primer elemento accederemos con [0].
let profiles = document.getElementsByName('profiles');


// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: obtener usuarios de GitHub relacionados con "JavaScript"
// -----------------------------------------------------------
const getProfiles = async () => {

    // Hacemos una petición GET a la API de GitHub usando la función genérica getData().
    // La URL 'search/users?q=JavaScript' devuelve usuarios cuyo perfil contiene la palabra "JavaScript".
    const response = await getData('https://api.github.com/search/users?q=JavaScript');

    // La respuesta de GitHub tiene una propiedad 'items' que es un array de resultados.
    // Mostramos por consola el primer usuario encontrado para inspeccionar sus datos.
    // Normalmente aquí veríamos propiedades como login, id, avatar_url, html_url, etc.
    console.log(response.items[0]);
};


// -----------------------------------------------------------
// ASOCIAR EL EVENTO CLICK AL ELEMENTO "profiles"
// -----------------------------------------------------------
// Accedemos al primer elemento con name="profiles" (profiles[0])
// y cuando el usuario haga clic sobre él, ejecutamos getProfiles().
// Este patrón sigue la forma correcta de asociar eventos con addEventListener.
profiles[0].addEventListener('click', getProfiles);

