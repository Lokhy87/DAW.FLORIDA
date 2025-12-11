
const form = document.querySelector("form");
const inputs = document.querySelectorAll('input[type="text"]');


function validateForm(event) {
    event.preventDefault();

    let todoCorrecto = true;
    let letraDNI = '';

    for (i = 0; i < inputs.length; i++) {

        if (inputs[i].placeholder == 'Nombre') {
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].placeholder == 'Primer apellido') {
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].placeholder == 'Segundo apellido') {
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].placeholder.toLowerCase() === 'dni') { 
            const regex = /^[0-9]{8}$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
                const numeroDNI = Number(inputs[i].value);
                const letras = "TRWAGMYFPDXBNJZSQVHLCKE";
                letraDNI = letras[numeroDNI % 23];
            }
        }

    }
    
    if (todoCorrecto) {
        alert("La letra del DNI es: " + letraDNI);
        form.reset();
    }
}

form.addEventListener('submit', (event) => validateForm(event));