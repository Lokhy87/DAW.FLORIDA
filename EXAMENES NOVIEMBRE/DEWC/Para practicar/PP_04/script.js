/* Cuando el usuario escriba un numeroe en un input y pulse un boton, muestre:
- Imagen del personaje
- Nombre
- Especie
*/

// Seleccion
const input = document.querySelector('[name="char"]');
const button = document.querySelector('button') // Podria hacerlo ("[name='get-char']")
const body = document.querySelector('body');

// Funcion
const getCharacter = async() => {
    const response = await fetch(`https://rickandmortyapi.com/api/character/${input.value}`);
    const data = await response.json();
    console.log(data); 

    // Estructura 
    if(document.querySelector('#card') === null) {
        let div = document.createElement('div');
        div.id = 'card';

        let img = document.createElement('img');
        img.id = 'char-img';

        let h2 = document.createElement('h2');
        h2.id = 'char-name';

        let p = document.createElement('p');
        p.id = 'char-species';

        // Meter img, h2 y p en div
        div.appendChild(img); 
        div.appendChild(h2);
        div.appendChild(p);
        
        // Meter el div en el body
        body.append(div);
    }
    document.querySelector('#char-img').src = data.image;
    document.querySelector('#char-name').textContent = data.name;
    document.querySelector('#char-species').textContent = data.species; 

}
button.addEventListener('click', getCharacter);