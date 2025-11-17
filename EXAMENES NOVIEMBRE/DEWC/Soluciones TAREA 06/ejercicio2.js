// Seleccionamos el elemento que tiene name="cats".
// getElementsByName devuelve una colección, por eso accedemos a la primera posición [0].
let cats = document.getElementsByName('cats')[0];


// -----------------------------------------------------------
// FUNCIÓN PRINCIPAL: obtener 10 gatos y mostrarlos
// -----------------------------------------------------------
const getCats = async () => {

    // Hacemos una petición GET a la API usando la función genérica getData().
    // The Cat API devolverá un array con 10 objetos (cada uno representa una imagen).
    const response = await getData('https://api.thecatapi.com/v1/images/search?limit=10');

    // Guardamos ese array en la variable photos para trabajar más cómodamente.
    let photos = response;

    // -----------------------------------------------------------
    // CREACIÓN DINÁMICA DE LAS IMÁGENES (solo la primera vez)
    // -----------------------------------------------------------
    // Comprobamos si ya existe la imagen con id="cat1".
    // Si NO existe, significa que es la primera vez que se hace clic.
    // En ese caso creamos dinámicamente las 10 imágenes.
    if (document.getElementById('cat1') === null) {

        // Usamos map() para recorrer las 10 imágenes que devuelve la API.
        photos.map((element, index) => {

            // Creamos un elemento <img> desde JavaScript.
            let img = document.createElement('img');

            // Modificamos su tamaño desde JS mediante style.
            img.style.height = '300px';
            img.style.width = '300px';

            // Asignamos un id dinámico a cada imagen: cat1, cat2, cat3, ..., cat10.
            img.id = `cat${index + 1}`;

            // Insertamos esta imagen dentro del segundo contenedor con class="table-wrapper".
            // (tableWrapper[1] es donde se quieren mostrar estas imágenes).
            tableWrapper[1].appendChild(img);
        });
    }

    // -----------------------------------------------------------
    // ACTUALIZACIÓN DEL SRC DE CADA IMAGEN
    // -----------------------------------------------------------
    // Una vez creadas (o si ya existían), volvemos a recorrer las fotos
    // y asignamos la URL de cada gato a su correspondiente <img>.
    photos.map((element, index) => {

        // Recuperamos cada imagen por su id (cat1, cat2, ..., cat10)
        // y actualizamos su atributo src con la URL recibida de la API.
        document.getElementById(`cat${index + 1}`).src = element.url;
    });
};


// -----------------------------------------------------------
// ASOCIAR EL EVENTO CLICK AL ELEMENTO 'cats'
// -----------------------------------------------------------
// Cuando el usuario haga clic en el elemento con name="cats",
// se ejecutará la función getCats(), que obtendrá las imágenes
// y las mostrará en pantalla.
cats.addEventListener('click', getCats);
