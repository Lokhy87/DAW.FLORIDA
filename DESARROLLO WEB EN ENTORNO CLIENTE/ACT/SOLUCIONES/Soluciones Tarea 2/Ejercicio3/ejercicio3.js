const form = document.getElementsByTagName('form')[0];
const inputs = document.getElementsByTagName('input');
const textArea = document.getElementsByTagName('textarea')[0];
const select = document.getElementsByTagName('select')[0];
const options = document.getElementsByTagName('option');
const labels = document.getElementsByTagName('label');



function testString(element) {
    const regex = /^[áéíóúÁÉÍÓÚa -zA-Z]+$/;
    if (regex.test(element.value) === true) {
        element.style.background = '';
        return true;
    } else {
        element.value = '';
        element.style.background = 'red';
        return false;
    }
}

function testYear(element) {
    const regex = /^[0-9]{4}$/;
    if (regex.test(element.value) === true) {
        element.style.background = '';
        return true;
    } else {
        element.value = '';
        element.style.background = 'red';
        return false;
    }
}

function isChecked(element) {
    if (element.checked) {
        return true;
    } else {
        return false;
    }
}

function getQualification(element) {
    if (element.value === '') {
        element.style.background = 'red';
        return false;
    } else {
        element.style.background = '';
        return true;
    }
}

function testForm(event) {
    event.preventDefault();
    let films = '';
    let message = '';
    let counter = 0;

    for (let i = 0; i < inputs.length - 1; i++) {
        if (i === 2) {
            if (!testYear(inputs[i])) counter++;
        } else if (i >= 4 && i <= 6) {
            if (isChecked(inputs[i])) films = labels[i - 4].innerHTML;
        } else if (i === 7) {
            if (!isChecked(inputs[i])) counter++;
        } else {
            if (!testString(inputs[i])) counter++;
        }
    }

    if (testString(textArea)) message = textArea.value;

    if (!getQualification(select)) counter++;

    if (counter === 0) {
        document.getElementsByTagName('p')[1].innerHTML = `El usuario ${inputs[0].value} que ve ${films} películas a la semana, ha visto el film ${inputs[1].value} (${inputs[3].value}, ${inputs[2].value}) piensa que "${options[select.value - 3].innerHTML}" y añade "${message}."`;
        form.reset();
    }
}


form.addEventListener('submit', (event) => testForm(event));
