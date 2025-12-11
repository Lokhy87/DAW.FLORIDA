let cover = document.getElementById('image').src;
let title = document.getElementsByName('monument_title')[0];
let country = document.getElementsByName('monument_country')[0];
let getMonumentData = document.getElementsByName('get_data');
let img = document.getElementById('image');


const getFormThree = (event) => {
    event.preventDefault();
    let monument = document.getElementsByName('monument')[0].value;
    let nation = document.getElementsByName('country')[0].value;
    let photo = document.getElementsByName('photo')[0].value;
    
    let monumentData = {
        monument: monument,
        country: nation,
        photo: photo
    }

    window.localStorage.setItem(monument, JSON.stringify(monumentData));
    forms[2].reset();
}

const getDataFromFormThree = () => {
    let monument = document.getElementsByName('get_data')[2].value;
    let data = window.localStorage.getItem(monument);
    data = JSON.parse(data);
    printMonument(data, 2);
    return data;
}

const printMonument = (data, form) => {
    title.textContent = data.monument;
    country.textContent = data.country;
    getMonumentData[form].value = "";
    img.src = data.photo;
}

const deleteMonument = (item) => {
    let monument = document.getElementsByName('get_data')[2].value;
    localStorage.removeItem(monument);
    getMonumentData[2].value = "";
    img.src = cover;
    title.textContent = "";
    country.textContent = "";
}


forms[2].addEventListener('submit', (event) => getFormThree(event));
deleteAll[2].addEventListener('click', deleteLocalStorage);
deleteElement[2].addEventListener('click', () => deleteMonument(2));
showData[2].addEventListener('click', () => getDataFromFormThree());