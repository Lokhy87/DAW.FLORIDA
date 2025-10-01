let modal = document.getElementsByClassName('modal')[0];


document.getElementsByClassName('trigger')[0].addEventListener('click', function () {
    modal.className = 'modal show-modal';
});

document.getElementsByClassName('close-button')[0].addEventListener('click', function () {
    modal.className = 'modal';
});
