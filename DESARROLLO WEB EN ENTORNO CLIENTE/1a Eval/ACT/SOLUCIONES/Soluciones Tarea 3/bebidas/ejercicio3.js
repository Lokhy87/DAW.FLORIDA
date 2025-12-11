let images = document.getElementsByTagName('img');


function addPhoto(category, index){
    checkImages();
    let img = document.createElement('img');
    img.src = `./src/${category}/${index}.jpg`;
    td.appendChild(img);
};

function checkImages(){
    if(images.length > 6) {
        images[6].remove();
    }
}