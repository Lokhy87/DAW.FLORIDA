// Seleccion 
const form = document.querySelector('form');
const input = document.querySelector('[name="name"]');
const renderDiv = document.querySelector('#render');


// Funcion limpiar el formulario
const clearDefinitions = () => {
    const oldParagraphs = renderDiv.querySelectorAll('p');
    oldParagraphs.forEach(p => p.remove());
};


// Funcion principal
const handleSubmit = async (event) => {
    event.preventDefault(); // Evitamos que el formulario recargue la página

    const word = input.value; // Obtenemos la palabra escrita por el usuario

    // Si el usuario no ha escrito nada, no hacemos nada
    if (!word) {
        alert('Por favor, escribe una palabra.');
        return;
    }

    // Limpiamos el input (borrar los datos del formulario)
    input.value = '';

    // Limpiamos las definiciones anteriores (si las hubiera)
    clearDefinitions();

    try {


        const url = `https://api.dictionaryapi.dev/api/v2/entries/en/${word}`;

        // 3.2. Petición GET HTTP a la API
        const response = await fetch(url);

        // Si la respuesta NO es correcta (por ejemplo, palabra no encontrada)
        if (!response.ok) {
            // Podemos mostrar un mensaje de error al usuario
            const errorP = document.createElement('p');
            errorP.textContent = `No se han encontrado definiciones para "${word}".`;
            renderDiv.appendChild(errorP);
            return;
        }


        const data = await response.json();
        console.log(data); // Para inspeccionar en consola si quieres

        // Array para acumular todas las definiciones en texto
        const allDefinitions = [];

        data.forEach(entry => {
            
            entry.meanings.forEach(meaning => { // Array
                
                meaning.definitions.forEach(defObj => { // Array de objetos con definition
                    if (defObj.definition) {
                        allDefinitions.push(defObj.definition);
                    }
                });
            });
        });

        // Si después de recorrer no encontramos definiciones:
        if (allDefinitions.length === 0) {
            const noDef = document.createElement('p');
            noDef.textContent = `No se han encontrado definiciones para "${word}".`;
            renderDiv.appendChild(noDef);
            return;
        }

        // Pintamos cada definición en un párrafo 
        allDefinitions.forEach((definition, index) => {
            const p = document.createElement('p');
            p.textContent = `${index + 1}. ${definition}`;
            renderDiv.appendChild(p);
        });

    } catch (error) {
        // Si hay un error de red o algo inesperado
        console.error('Error al obtener definiciones:', error);
        const errorP = document.createElement('p');
        errorP.textContent = 'Ha ocurrido un error al consultar el diccionario.';
        renderDiv.appendChild(errorP);
    }
};


// Ejecutar
form.addEventListener('submit', handleSubmit);