let paragraphs = document.getElementsByTagName('p');
let colors = ['green', 'red', 'blue', 'purple'];
let sizes = ['20px', '30px', '40px', '50px'];

function changeParagraph(index) {
    paragraphs[index].style.color = colors[index];
    paragraphs[index].style.fontFamily = 'arial';
    paragraphs[index].style.fontWeight = 'bold';
    paragraphs[index].style.fontSize = sizes[index];
}


for (let i = 0; i < paragraphs.length; i++) {
    paragraphs[i].addEventListener('click', () => changeParagraph(i));
}