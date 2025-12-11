const form = document.getElementsByTagName('form')[0];
const inputs = document.getElementsByTagName('input');


function testString(element) {
    const regex = /^[áéíóúÁÉÍÓÚa-zA-Z]+$/;
    if (regex.test(element.value) === true) {
        element.style.background = '';
        return true;
    } else {
        element.value = '';
        element.style.background = 'red';
        return false;
    }
}


function testDni(element) {
    const regex = /^[0-9]{8}$/;
    if (regex.test(element.value) === true) {
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
            if (!testDni(inputs[i])) counter++;
        }
    }
    if (counter === 0) {
        let letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
        alert(letters[inputs[3].value % 23]);
        form.reset();
    }
}



form.addEventListener('submit', (event) => validateForm(event));