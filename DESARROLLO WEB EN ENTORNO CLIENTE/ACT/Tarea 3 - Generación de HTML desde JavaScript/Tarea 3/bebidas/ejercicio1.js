let contenedor = document.querySelector('.container');

const bebidas = [
    {nombre: 'Cafe', ruta: 'src/cafe/1.jpg'},
    {nombre: 'Infusions', ruta: 'src/infusiones/1.jpg'},
    {nombre: 'Alcohol', ruta: 'src/alcohol/1.jpg'}
];

bebidas.forEach(bebida => {
    let div = document.createElement('div');
    div.classList.add('card');

    div.style.position = "relative";
    div.style.display = "inline-block";
    div.style.margin = "20px";
    div.style.width = "250px";

    let img = document.createElement('img');
    img.src = bebida.ruta;
    
    img.style.width = "100%";
    img.style.display = "block";

    let span = document.createElement('span');
    span.textContent = bebida.nombre;

    span.style.position = "absolute";
    span.style.top = "50%";
    span.style.left = "50%";
    span.style.transform = "translate(-50%, -50%)";
    span.style.color = "white";
    span.style.fontSize = "24px";
    span.style.fontWeight = "bold";
    span.style.textShadow = "2px 2px 6px rgba(0,0,0,0.6)";

    div.appendChild(img);
    div.appendChild(span);
    contenedor.appendChild(div);
});