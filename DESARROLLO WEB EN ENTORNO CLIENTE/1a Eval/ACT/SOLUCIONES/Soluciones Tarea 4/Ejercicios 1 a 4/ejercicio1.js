let photos = document.getElementsByClassName('photo');

Array.from(photos).map((element, i) => {
    element.style.backgroundImage = `url(images/${i + 1}.jpg)`;
});

