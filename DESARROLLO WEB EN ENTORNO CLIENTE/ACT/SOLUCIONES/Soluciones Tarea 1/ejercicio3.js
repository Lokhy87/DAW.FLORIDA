let title = document.getElementsByTagName('h1')[0];
let test = true;


function changeTitle() {
    if (test === true) {
        title.textContent = 'Tu bar para almorzar' 
    } else {
        title.textContent = 'Casa Pepe';
    }
    test = !test;
}


title.addEventListener('mouseover', changeTitle);
title.addEventListener('mouseout', changeTitle);