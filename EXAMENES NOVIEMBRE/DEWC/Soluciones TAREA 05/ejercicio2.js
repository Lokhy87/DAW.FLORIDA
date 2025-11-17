const getDataFromFormTwo = (form) => {
    let datos = getData(form);
    document.getElementById('paragraph').style.color = datos.color;
}


forms[1].addEventListener('submit', (event) => getDataFromForm(event, 1));
deleteAll[1].addEventListener('click', deleteLocalStorage);
deleteElement[1].addEventListener('click', () => deleteItem(1));
showData[1].addEventListener('click', () => getDataFromFormTwo(1));