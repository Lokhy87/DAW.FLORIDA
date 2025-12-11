let forms = document.getElementsByTagName('form');
let deleteAll = document.getElementsByName('button_delete_all');
let deleteElement = document.getElementsByName('button_delete_item');
let showData = document.getElementsByName('button_get_data');
let user = null;

const getDataFromForm = (event, form) => {
    event.preventDefault();
    save(form);
    forms[form].reset();
}

const save = (form) => {
    let name = document.getElementsByName('name')[form].value;
    let firstSurname = document.getElementsByName('first_surname')[form].value;
    let secondSurname = document.getElementsByName('second_surname')[form].value;
    let dni = document.getElementsByName('dni')[form].value;

    user = {
        name: name,
        firstSurname: firstSurname,
        secondSurname: secondSurname,
        dni: dni,
    }
    if(form === 1) {
        let color = document.getElementById('color');
        user.color = color.options[color.selectedIndex].text;
    }

    window.localStorage.setItem(dni, JSON.stringify(user));
}

const getData = (form) => {
    let dni = document.getElementsByName('get_data')[form].value;
    let data = window.localStorage.getItem(dni);
    data = JSON.parse(data);
    printData(data, form);
    return data;
}

const printData = (data, form) => {
    let paragraph = document.createElement('p');
    let info = document.createTextNode(`Nombre: ${data.name}. Apellidos: ${data.firstSurname} ${data.secondSurname}. DNI: ${data.dni}`);
    paragraph.appendChild(info);
    let element = document.getElementsByName('print_data')[form];
    element.appendChild(paragraph);
    document.getElementsByName('get_data')[form].value = '';
}

const deleteItem = (item) => {
    let dni = document.getElementsByName('delete_item')[item].value;
    localStorage.removeItem(dni);
    document.getElementsByName('delete_item')[item].value = '';
}

const deleteLocalStorage = () => {
    localStorage.clear();
}


forms[0].addEventListener('submit', (event) => getDataFromForm(event, 0));
deleteAll[0].addEventListener('click', deleteLocalStorage);
deleteElement[0].addEventListener('click', () => deleteItem(0));
showData[0].addEventListener('click', () => getData(0));