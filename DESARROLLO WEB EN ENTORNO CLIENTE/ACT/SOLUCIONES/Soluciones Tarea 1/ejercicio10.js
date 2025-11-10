let title = document.getElementsByTagName('h1')[0];

function mousemove(e) {
    let x = e.clientX;
    let y = e.clientY;

    if (x > 0 && x < 500 && y > 0 && y < 500) {
        title.style.color = 'yellow';
    } else if (x > 0 && x < 500 && y >= 500 && y < 1000) {
        title.style.color = 'red';
    } else if (x >= 500 && x < 1000 && y > 0 && y < 500) {
        title.style.color = 'blue';
    } else if (x >= 500 && x < 1000 && y >= 500 && y < 1000) {
        title.style.color = 'green';
    } else {
        title.style.color = 'white';
    }
}

window.addEventListener('mousemove', (e) => mousemove(e));