// Seleccionamos el elemento que tiene name="cat".
// getElementsByName devuelve una colección (NodeList/HTMLCollection),
// por eso accedemos a la primera posición [0].
let cat = document.getElementsByName('cat')[0];

// Seleccionamos todos los elementos con class="table-wrapper".
// También devuelve una colección; luego usaremos tableWrapper[0].
let tableWrapper = document.getElementsByClassName('table-wrapper');


// -----------------------------------------------------------
// FUNCIÓN GENÉRICA PARA HACER PETICIONES GET CON FETCH
// -----------------------------------------------------------
// Declaramos una función asíncrona que recibe una URL y devuelve
// los datos en formato JSON.
const getData = async (url) => {
    try {
        // Hacemos la petición HTTP GET a la URL indicada.
        // await hace que esperemos a que la promesa de fetch se resuelva.
        const response = await fetch(url);

        // Comprobamos si la respuesta es correcta (códigos 200–299).
        if (response.ok) {
            // Convertimos el cuerpo de la respuesta a JSON.
            // Esto también devuelve una promesa, por eso usamos await.
            const jsonResponse = await response.json();

            // Devolvemos el JSON para que otra función pueda usarlo.
            return jsonResponse;
        }
    } catch (error) {
        // Si ocurre algún error en la petición o en el parseo del JSON,
        // lo mostramos por consola.
        console.log(error);
    }
}


// -----------------------------------------------------------
// FUNCIÓN ESPECÍFICA PARA OBTENER Y MOSTRAR UN GATO
// -----------------------------------------------------------
// Esta función se ejecutará cuando el usuario haga click sobre el elemento 'cat'.
const getCat = async () => {

    // Llamamos a nuestra función genérica getData pasándole la URL de la API.
    // The Cat API devuelve un array con un objeto que contiene, entre otras cosas, la URL de la imagen.
    const response = await getData('https://api.thecatapi.com/v1/images/search?size=full');

    // Guardamos en 'photo' la URL de la imagen del gato.
    // Como la respuesta es un array, accedemos a la posición 0 y luego a la propiedad 'url'.
    let photo = response[0].url;

    // Comprobamos si ya existe en el DOM una imagen con id="cat".
    // Si NO existe (=== null), la creamos de forma dinámica.
    if (document.getElementById('cat') === null) {

        // Creamos un elemento <img> desde JavaScript.
        let img = document.createElement('img');

        // Asignamos tamaño a la imagen mediante estilos inline.
        img.style.height = '300px';
        img.style.width = '300px';

        // Le asignamos un id="cat" para poder localizarla fácilmente después.
        img.id = 'cat';

        // Insertamos la imagen en el DOM, dentro del primer elemento con class="table-wrapper".
        tableWrapper[0].appendChild(img);
    }

    // Tanto si la imagen la acabamos de crear como si ya existía,
    // aquí le asignamos el atributo 'src' con la URL recibida de la API.
    document.getElementById('cat').src = photo;
}


// -----------------------------------------------------------
// ASOCIAR EVENTO CLICK AL ELEMENTO 'cat'
// -----------------------------------------------------------
// Cuando el usuario haga click en el elemento que hemos guardado en la variable 'cat',
// se ejecutará la función getCat, que hará la petición a la API y actualizará la imagen.
cat.addEventListener('click', getCat);

