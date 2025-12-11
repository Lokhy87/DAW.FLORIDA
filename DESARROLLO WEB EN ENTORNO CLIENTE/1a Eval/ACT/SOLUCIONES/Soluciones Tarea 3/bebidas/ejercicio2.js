let h1s = document.getElementsByTagName('h1');


function deleteCategories(index) {
    for (let i = 0; i < 3; i++) {
        h1s[1].remove();
    }
    return cretePhotos(index);
}

function cretePhotos(index) {
    let drinks = ['cafe', 'infusiones', 'alcohol'];
    for (let i = 1; i < 6; i++) {
        let img = document.createElement('img');
        img.style.width = '20%';
        img.src = `./src/${drinks[index - 1]}/${i}.jpg`;
        td.appendChild(img);
        img.addEventListener('click', () => addPhoto(drinks[index - 1], i));
    }
}


for (let i = 1; i < h1s.length; i++) {
    h1s[i].addEventListener('click', () => deleteCategories(i));
}

