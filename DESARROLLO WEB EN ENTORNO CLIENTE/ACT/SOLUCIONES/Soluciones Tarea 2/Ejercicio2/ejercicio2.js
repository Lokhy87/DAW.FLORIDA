const form = document.getElementsByTagName('form')[0];
const inputs = document.getElementsByTagName('input');

function testString(element) {
    const regex = /^[áéíóúÁÉÍÓÚa-zA-Z]+$/;
    if (regex.test(element.value) === true) {
        element.style.backgroundColor = '';
        return true;
    } else {
        element.value = '';
        element.style.background = 'red';
        return false;
    }
}

function testEmail(element) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/u;
    if (regex.test(element.value)) {
        element.style.background = '';
        return true;
    } else {
        element.value = '';
        element.style.background = 'red';
        return false;
    }
}

function validateForm(event) {
    event.preventDefault();

    let counter = 0;
    for (let i = 0; i < inputs.length - 1; i++) {
        if (i !== inputs.length - 2) {
            if (!testString(inputs[i])) counter++;
        } else {
            if (!testEmail(inputs[i])) counter++;
        }
    }
    if (counter === 0) {
        form.reset();
        alert('Tus datos se han introducido correctamente.');
    }
}


form.addEventListener('submit', (event) => validateForm(event));