// Ejecutamos el código cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {

  // 1. Seleccionamos TODOS los divs que tienen la clase "photo"
  const photoDivs = document.querySelectorAll('.photo');
  // Tendrás 9 divs, uno para cada hueco del grid

  // 2. Recorremos cada div .photo
  photoDivs.forEach((photoDiv, index) => {
    // index será: 0,1,2,...,8

    // Creamos la etiqueta <img>
    const img = document.createElement('img');

    // Como tus imágenes están dentro de /images/
    // y se llaman 1.jpg, 2.jpg, ..., 9.jpg
    img.src = `images/${index + 1}.jpg`;

    // Añadimos texto alternativo
    img.alt = `Foto ${index + 1}`;

    // Metemos la imagen dentro del div.photo correspondiente
    photoDiv.appendChild(img);
  });

});










