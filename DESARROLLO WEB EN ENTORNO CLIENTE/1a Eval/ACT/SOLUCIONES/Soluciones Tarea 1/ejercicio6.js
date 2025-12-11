let tablebot = document.getElementById('tablebot');
tablebot.style.visibility = 'hidden';
let test = true;

function showSandwiches() {
    if (test === true) {
        tablebot.style.visibility = 'visible'
    } else {
        tablebot.style.visibility = 'hidden';
    }     
    test = !test;
}


document.getElementsByTagName('h1')[0].addEventListener('dblclick', showSandwiches);