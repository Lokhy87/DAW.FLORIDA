let img = document.getElementsByTagName('img')[1];
let content = document.getElementsByTagName('p')[0];
let paragraph = content.innerHTML;
let fontWeight = content.style.fontWeight;
let desserts = ['Flan con huevo', 'Flan con nata', 'Tarta de manzana', 'Tarta de queso', 'Tarta de zanahoria', 'Tiramisu'];


function mousedown() {
    content.innerHTML = desserts[current];
    content.style.color = 'red';
    content.style.fontWeight = 'bold';
};

function mouseup() {
    content.innerHTML = paragraph;
    content.style.fontWeight = fontWeight;
    content.style.color = 'black';
};


img.addEventListener('mouseup', mouseup);
img.addEventListener('mousedown', mousedown);