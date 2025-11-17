/* Implementa un script en JavaScript para que, cuando el usuario pulse sobre el botón con el atributo name="dog", se realice una petición HTTP GET a la siguiente API pública: https://dog.ceo/api/breeds/image/random
*/

// -----------------------------------------------------------
// FUNCIÓN GENÉRICA PARA PETICIONES HTTP GET
// -----------------------------------------------------------
// Esta función recibe una URL y devuelve los datos convertidos a JSON.
// Se reutiliza en cualquier llamada a APIs externas.
const getData = async (url) => {
    try {
        // Hacemos la petición GET con fetch.
        // await hace que esperemos la respuesta sin bloquear el resto del programa.
        const response = await fetch(url);

        // Comprobamos si la respuesta es correcta (códigos 200–299).
        if (response.ok) {

            // Convertimos la respuesta a formato JSON.
            // Todas las APIs públicas devuelven datos en JSON, así que esto es obligatorio.
            const json = await response.json();

            // Devolvemos los datos para que la función que llama pueda usarlos.
            return json;
        }

    } catch (error) {
        // Si ocurre un error (sin internet, URL mal escrita, API caída...),
        // lo mostramos en consola.
        console.log(error);
    }
};

// SELECCION ELEMENTOS DEL DOM
let dog = document.querySelector("[name='dog']");
let tableWrapper = document.querySelector('.table-wrapper');

// FUNCION PRINCIPAL
const getDog = async() => {
    const response = await getData('https://dog.ceo/api/breeds/image/random'); // Llamamos a la funcion generica para pedir perrro aleatorio

    console.log(response);

    let photo = response.message; // Guardamos URL de la img, que tiene la propiedad message

    if(document.querySelector('#dog') === null) { // Si no existe, la creamos dinamicamente
        let img = document.createElement('img'); 

        img.style.height = '200px';
        img.style.width = '200px';

        img.id = 'dog'; // Asignamos id 

        tableWrapper.appendChild(img);
    }
    document.querySelector('#dog').src = photo
}

dog.addEventListener('click', getDog);

