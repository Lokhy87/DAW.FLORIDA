let contenedor = document.querySelector('.container');
let tabla = document.querySelector('#tablebot'); 
let imagenPrincipal = document.querySelector('#tablebot img');
let titulo = document.querySelector('h1');
let categoriaActual = 'cafe'; 

// Inicializar imagen por defecto
imagenPrincipal.src = 'src/cafe/1.jpg'; 
imagenPrincipal.style.width = '400px'; 

// Crear 5 imágenes 
function mostrarMenu(categoria) {
    tabla.innerHTML = ''; 

    for (let i = 1; i <= 5; i++) {
        let nuevaImg = document.createElement('img');
        nuevaImg.src = `src/${categoria}/${i}.jpg`;
        nuevaImg.style.width = '100px'; 
        nuevaImg.style.margin = '5px';
        nuevaImg.style.cursor = 'pointer';
        tabla.appendChild(nuevaImg);

        nuevaImg.addEventListener('click', function() {
            mostrarImagenAmpliada(nuevaImg.src);
        });
    }
}

// Imagen unica ampliada
function mostrarImagenAmpliada(src) {
    tabla.innerHTML = '';
    let grande = document.createElement('img');
    grande.src = src;
    grande.style.width = '400px';
    grande.style.height = 'auto';
    grande.style.border = '2px solid black';
    tabla.appendChild(grande);
}

// Imagen Principal 
imagenPrincipal.addEventListener('click', function() {
    mostrarMenu(categoriaActual);
});


// Crear y mostrar el modal
function crearModal() {
    
    let modelo = document.createElement('div');
    modelo.id = 'modal-overlay';
    modelo.style.cssText = `
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Gris transparente */
        display: flex; justify-content: center; align-items: center;
        z-index: 1000;
    `;

    modelo.innerHTML = `
        <div id="modal-content" style="
            background: white; width: 90%; max-width: 450px; 
            padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            position: relative; /* Necesario para posicionar la 'x' */
        ">
            <button id="cerrar-modal" style="
                position: absolute; top: 5px; right: 10px; border: none; background: none; 
                font-size: 1.2em; cursor: pointer;
            ">&times;</button>
            
            <div style="background-color: #f8f8f8; padding: 10px; display: flex; align-items: center; margin-bottom: 10px;">
                <label for="entrada" style="margin-right: 10px; font-weight: bold;">Nombre</label>
                <input type="text" id="entrada" placeholder="cafe, infusiones o alcohol" style="flex-grow: 1; padding: 5px; border: 1px solid #ccc; color: black;">
            </div>

            <div style="text-align: center;">
                <button id="ok" style="padding: 8px 20px; border: 1px solid #000; background: #fff; cursor: pointer;">Enviar</button>
            </div>
        </div>
    `;

    document.body.appendChild(modelo);

    // Cerrar el modal
    document.getElementById('cerrar-modal').addEventListener('click', function() {
        document.body.removeChild(modelo);
    });

    document.getElementById('ok').addEventListener('click', function() {
        let valor = document.getElementById('entrada').value.toLowerCase().trim();
        const categoriasValidas = ['cafe', 'infusiones', 'alcohol'];

        if (categoriasValidas.includes(valor)) {
            categoriaActual = valor;
            imagenPrincipal.src = `src/${categoriaActual}/1.jpg`;
            mostrarMenu(categoriaActual);
            document.body.removeChild(modelo);
        } else {
            alert('¡ERROR! Los datos introducidos no son correctos.');
        }
    });
}

titulo.addEventListener('click', crearModal);



