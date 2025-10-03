let contenedor = document.querySelector('.container');
let imagenes = document.querySelectorAll('.card img');


imagenes.forEach(imag => {
    imag.addEventListener('click', () => {
        contenedor.innerHTML = '';
        for (let i = 1; i <= 5; i++) {
            let nuevaImg = document.createElement("img");
            nuevaImg.src = 'src/cafe/${i}.jpg';
            contenedor.appendChild(nuevaImg);
        }
    })
})




