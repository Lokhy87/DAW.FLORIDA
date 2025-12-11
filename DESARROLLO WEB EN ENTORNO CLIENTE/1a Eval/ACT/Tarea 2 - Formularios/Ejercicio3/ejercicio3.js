const form = document.querySelector("form");
const inputs = document.querySelectorAll('input[type="text"]');


function validateForm(event) {
    event.preventDefault();

    let todoCorrecto = true;


    for (i = 0; i < inputs.length; i++) {

        if (inputs[i].placeholder == 'Nickname') {
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].placeholder == 'Pelicula') {
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].placeholder == 'Año') { // Cambiar a numero 
            const regex = /^[áéíóúa-zA-Z]+$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }

        } else if (inputs[i].name == 'category'){ // Cambiar 
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            console.log(regex.test(inputs[i].value));
            if (inputs[i].value == '' || !regex.test(inputs[i].value)) {
                inputs[i].style.background = "red";
            } else {
                inputs[i].style.background = "white"; 
            }
        } else if (inputs[i].name == 'frequency')
    }
    
    if (todoCorrecto) {
        form.reset();
    }
}

form.addEventListener('submit', (event) => validateForm(event));