let td = document.getElementsByTagName('td')[0];
let title = document.getElementsByTagName('h1')[1];
let contents = [
    { title: 'Cafe', route: 'url(src/cafe/1.jpg)' },
    { title: 'Infusiones', route: 'url(src/infusiones/1.jpg)' },
    { title: 'Alcohol', route: 'url(src/alcohol/1.jpg)' }];


for (let i = 0; i < contents.length; i++) {
    let h1 = document.createElement('h1');
    h1.style.backgroundImage = contents[i].route;
    h1.style.color = 'white';
    h1.style.height = '300px';
    h1.style.width = '30%';
    h1.style.display = 'inline-block';
    h1.textContent = contents[i].title;
    td.appendChild(h1);
}


title.remove();