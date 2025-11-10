let imgs = document.getElementsByTagName('img');
let modal = document.getElementsByClassName('modal');
let sandwich = document.getElementsByTagName('h1');
let sandwichesArray = ['Chivito', 'Blanco y negro', 'Brascada', 'Almussafes', 'Tortilla de patatas', 'Calamares en alioli'];
let links = ["Xivito", "Blanc_i_negre_(entrep%C3%A0)", "Brascada", "Almussafes_(entrep%C3%A0)", "Truita_de_patates", "Entrep%C3%A0_de_calamars"];


function changeSandwiches(test, index) {
    if (test === true) {
        imgs[index].style.opacity = '0.5';
    } else {
        imgs[index].style.opacity = '1';
    }
}

function showModal(index) {
    modal[0].className = 'modal show-modal';
    sandwich[1].innerHTML = `<a href="https://ca.wikipedia.org/wiki/${links[index - 1]}" target="_blank">${sandwichesArray[index - 1]}</a>`;
}

function closeModal() {
    modal[0].className = 'modal';
}


for (let i = 1; i < imgs.length; i++) {
    imgs[i].addEventListener('mouseover', () => changeSandwiches(true, i));
    imgs[i].addEventListener('mouseout', () => changeSandwiches(false, i));
    imgs[i].addEventListener('click', () => showModal(i));
}
document.getElementsByClassName('close-button')[0].addEventListener('click', closeModal);