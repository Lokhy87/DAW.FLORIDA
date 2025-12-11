// =======================================================
// EJERCICIO 3 - CARRUSEL DE PALABRAS + EFECTO TRAGAPERRAS
// =======================================================

document.addEventListener('DOMContentLoaded', () => {

  // -------------------------------------------------------
  // 1. SELECCIÓN DE ELEMENTOS
  // -------------------------------------------------------
  const banner = document.querySelector('.banner');
  const title = document.querySelector('.banner-text h2');

  // -------------------------------------------------------
  // 2. PALABRAS + IMÁGENES DE FONDO (ONLINE)
// -------------------------------------------------------
// Puedes cambiar estas imágenes cuando quieras.
// Funcionan seguro porque son URLs directas.
  const words = [
    {
      text: 'Examen',
      background: "url('https://wallpapercave.com/wp/wp3994859.jpg')"
    },
    {
      text: 'Primera',
      background: "url('https://wallpapercave.com/wp/wp5307072.jpg')"
    },
    {
      text: 'evaluación',
      background: "url('https://wallpapercave.com/wp/wp3587272.jpg')"
    }
  ];

  let currentIndex = 0;

  const RANDOM_CHARS =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789áéíóúÁÉÍÓÚ';

  // Transición de 1 segundo entre imágenes
  banner.style.transition = 'background-image 1s ease-in-out';


  // -------------------------------------------------------
  // 3. DEVOLVER LETRA ALEATORIA
  // -------------------------------------------------------
  const getRandomChar = () => {
    const r = Math.floor(Math.random() * RANDOM_CHARS.length);
    return RANDOM_CHARS[r];
  };

  // -------------------------------------------------------
  // 4. ANIMAR UNA PALABRA CON EFECTO "TRAGAPERRAS"
  // -------------------------------------------------------
  const animateWord = (word, callback) => {
    const len = word.length;

    let locked = 0;      // cuántas letras reales van quedándose fijas
    let frame = 0;       // frames totales
    const FRAMES_PER_LOCK = 5;

    // Se ejecuta cada 50ms → cambia letras rápido
    const interval = setInterval(() => {
      frame++;

      // Cuando pasan suficientes frames, fijamos una letra más
      if (frame % FRAMES_PER_LOCK === 0 && locked < len) {
        locked++;
      }

      let result = "";

      for (let i = 0; i < len; i++) {

        // De dónde empiezan las letras "fijas"
        const lockFrom = len - locked;

        if (i >= lockFrom) {
          result += word[i];     // letra real
        } else {
          result += getRandomChar(); // letra aleatoria
        }
      }

      title.textContent = result;

      // si ya está completa, paramos
      if (locked === len) {
        clearInterval(interval);
        setTimeout(() => callback(), 1000);
      }

    }, 50);
  };

  // -------------------------------------------------------
  // 5. FUNCIÓN PRINCIPAL DEL CARRUSEL
  // -------------------------------------------------------
  const runCarousel = () => {
    const w = words[currentIndex];

    // Cambiamos la imagen
    banner.style.backgroundImage = w.background;

    // Animamos la palabra
    animateWord(w.text, () => {
      // Pasamos a la siguiente palabra
      currentIndex = (currentIndex + 1) % words.length;

      // Ejecutamos el siguiente ciclo
      runCarousel();
    });
  };

  // Arrancar el carrusel
  runCarousel();

});
