let botones = document.querySelectorAll('.category');
let contenedor = document.querySelector('.series');

botones.forEach(boton => {
    boton.addEventListener('click', function() {
        console.log('Has hecho click en: ', boton.textContent);

    if (boton.textContent == 'series') {
        let descripcion = document.querySelector('.description').innerHTML;
        contenedor.innerHTML = descripcion;
    } else {
        contenedor.innerHTML = '';
    }
    })
})




