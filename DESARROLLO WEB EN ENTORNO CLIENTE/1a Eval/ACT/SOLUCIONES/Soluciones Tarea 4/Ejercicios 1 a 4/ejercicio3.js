const changePhotos = (opacity, dimensions) => {
    Array.from(photos).map((element) => {
        element.style.opacity = opacity;
        element.style.height = element.style.width = dimensions;
    });
}

[3700, 4000, 4400, 4800].map((time, index) => {
    setTimeout(() => {
        (index % 2 === 0) ? changePhotos('50%', '105%') : changePhotos('100%', '100%');
        (index === 3) && Array.from(photos).map((element, index) => element.addEventListener('click', () => removePhotos(index)));
    }, time);
});
