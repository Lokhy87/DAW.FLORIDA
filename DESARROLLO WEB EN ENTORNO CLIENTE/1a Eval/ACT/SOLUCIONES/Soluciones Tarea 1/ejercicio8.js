let dessertImage = document.getElementsByTagName('img');
let route = 'src/postres/';
let dessertArray = ['Flan con huevo.jpg', 'Flan con nata.jpg', 'Tarta de manzana.jpg', 'Tarta de queso.jpg', 'Tarta de zanahoria.jpg', 'Tiramisu.jpg'];
let current = 0;
document.getElementsByTagName('img')[1].src = route + dessertArray[current];


function next() {
    if (current === dessertArray.length - 1) {
        current = 0;
    } else {
        current++;
    }
    dessertImage[1].src = route + dessertArray[current];
}

function previous() {
    if (current === 0) {
        current = dessertArray.length - 1;
    } else {
        current--;
    }
    dessertImage[1].src = route + dessertArray[current];
}


document.getElementsByTagName('a')[1].addEventListener('click', next);
document.getElementsByTagName('a')[0].addEventListener('click', previous);