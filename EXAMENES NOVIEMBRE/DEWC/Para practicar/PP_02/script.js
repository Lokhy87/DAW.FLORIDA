/* Implementa un script en JavaScript para que, cuando el usuario pulse sobre el botón con el atributo: name="dogs" se realice una petición HTTP GET a la Dog API para obtener 10 imágenes de perros.
*/

// SELECCION ELEMENTOS DEL DOM
let dogs = document.querySelector("[name='dogs']");
let tableWrapper = document.querySelector('.table-wrapper');

// FUNCION PRINCIPAL
const getDogs = async() => {
    const response = await fetch('https://dog.ceo/api/breeds/image/random/10'); // Llamamos a la funcion generica para pedir perrro aleatorio

    const data = await response.json(); // Convertimos la respuesta a JSON

    // console.log(response);

    let photo = data.message; // Guardamos URL de la img, que tiene la propiedad message

    if(document.querySelector('#dog1') === null) { // Si no existe, la creamos dinamicamente
        photo.map((url, index) => {
            let img = document.createElement('img');

            img.style.height = '200px';
            img.style.width = '200px';

            img.id = `dog${index + 1}`; // Asignamos id 

            tableWrapper.appendChild(img);
        })
        
    }
    photo.map((url, index) => {
        document.querySelector(`#dog${index + 1}`).src = url;
    });
};

dogs.addEventListener('click', getDogs);

