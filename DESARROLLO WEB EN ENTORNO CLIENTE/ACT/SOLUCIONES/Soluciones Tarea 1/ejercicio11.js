let tds = document.getElementsByTagName('td');
let colorDefault = title.style.backgroundColor;


function keydown(event) {
    switch (event.key) {
        case 'A':
            title.style.backgroundColor = tds[1].style.backgroundColor = tds[2].style.backgroundColor = 'purple';
            break;
        case 'B':
            title.style.backgroundColor = tds[1].style.backgroundColor = tds[2].style.backgroundColor = 'pink';
            break;
        case 'C':
            title.style.backgroundColor = tds[1].style.backgroundColor = tds[2].style.backgroundColor = 'salmon';
            break;
        default:
            title.style.backgroundColor = tds[1].style.backgroundColor = tds[2].style.backgroundColor = colorDefault;
            break;
    }
}

document.addEventListener('keydown', (e) => keydown(e));