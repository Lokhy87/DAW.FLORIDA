function setLang(lang) {

  const textos = {
    // Index
    "home.subtitle": {
      es: "Tu tienda de confianza en bicicletas, alquiler y reparaciones",
      val: "La teua botiga de confiança en bicicletes, lloguer i reparacions"
    },
     
    "home.subtitle2":  { es: "Tu tienda de confianza en bicicletas, alquiler y reparaciones", val: "La teua botiga de confiança en bicicletes, lloguer i reparacions" },

    "nav.inicio": { es: "Inicio",   val: "Inici"   },
    "nav.venta": { es: "Venta", val: "Venda" },
    "nav.alquiler": { es: "Alquiler", val: "Lloguer" },
    "nav.taller": { es: "Taller", val: "Taller" },

    "home.quienessomos": { es: "¿Quiénes somos?", val: "Qui som?" },
    "home.queofrecemos": { es: "¿Qué ofrecemos?", val: "Què oferim?" },
    "home.dondeestamos": { es: "¿Dónde estamos?", val: "On estem?" },

    "contact.direccion": { es: "Dirección:", val: "Adreça:" },
    "contact.telefono": { es: "Teléfono:", val: "Telèfon:" },
    "contact.email": { es: "Email:", val: "Correu:" },

    "home.quienessomos.parrafo1": {
        es: "BicisVal nació como un pequeño negocio familiar en el corazón de Valencia, fruto de una gran pasión por el ciclismo y la movilidad sostenible. Con más de una década de experiencia, nos hemos convertido en un punto de referencia para quienes disfrutan de moverse sobre dos ruedas, ya sea por deporte, ocio o compromiso con el medio ambiente.",
        val: "BicisVal va nàixer com un xicotet negoci familiar al cor de València, fruit d'una gran passió pel ciclisme i la mobilitat sostenible. Amb més d'una dècada d'experiència, ens hem convertit en un punt de referència per a qui gaudeix de moure's sobre dues rodes, ja siga per esport, oci o compromís amb el medi ambient."
    },
    "home.quienessomos.parrafo2": {
        es: "Nos gusta ofrecer un trato cercano y personalizado, ayudando a cada cliente a encontrar la bicicleta que mejor se adapta a su estilo de vida. Creemos en el trabajo bien hecho, en la confianza y en la satisfacción de ver a nuestros clientes volver con una sonrisa.",
        val: "Ens agrada oferir un tracte pròxim i personalitzat, ajudant cada client a trobar la bicicleta que millor s'adapta al seu estil de vida. Creiem en el treball ben fet, en la confiança i en la satisfacció de vore als nostres clients tornar amb un somriure."
    },
    "home.queofrecemos.intro": {
        es: "En BicisVal encontrarás todo lo que necesitas para disfrutar de la bici en cualquier situación:",
        val: "A BicisVal trobaràs tot el que necessites per a gaudir de la bici en qualsevol situació:"
    },
    "home.queofrecemos.final": {
        es: "Además, ofrecemos asesoramiento gratuito y revisiones rápidas sin cita previa. Tu bici y tu tiempo son nuestra prioridad.",
        val: "A més, oferim assessorament gratuït i revisions ràpides sense cita prèvia. La teua bici i el teu temps són la nostra prioritat."
    },
    "home.dondeestamos.parrafo1": {
        es: "Nos encontramos en el centro de Valencia, en la Calle de la Paz, número 24. Nuestro local cuenta con un pequeño taller visible desde el escaparate y una zona de exposición con las últimas novedades en bicicletas.",
        val: "Ens trobem al centre de València, al carrer de la Pau, número 24. El nostre local compta amb un xicotet taller visible des de l'aparador i una zona d'exposició amb les últimes novetats en bicicletes."
    },
    "home.dondeestamos.parrafo2": {
        es: "Puedes ponerte en contacto con nosotros a través del teléfono o email.",
        val: "Pots posar-te en contacte amb nosaltres mitjançant el telèfon o el correu electrònic."
    },
    "home.dondeestamos.parrafo3": {
        es: "¡Te atenderemos encantados!",
        val: "T'atendrem encantats!"
    },
    "home.queofrecemos.sec1-titulo": { es: "Venta:", val: "Venda:" },
    "home.queofrecemos.sec1-texto": {
        es: "disponemos de hasta 10 modelos distintos de bicicletas, desde urbanas hasta de montaña, seleccionadas por su calidad, diseño y durabilidad.",
        val: "disposem de fins a 10 models diferents de bicicletes, des d'urbanes fins de muntanya, seleccionades per la seua qualitat, disseny i durabilitat."
    },
    "home.queofrecemos.sec2-titulo": { es: "Alquiler:", val: "Lloguer:" },
    "home.queofrecemos.sec2-texto": {
        es: "contamos con 4 modelos diferentes de bicicletas para alquiler por horas o días, perfectas para descubrir Valencia de una forma cómoda y ecológica.",
        val: "comptem amb 4 models diferents de bicicletes per a lloguer per hores o dies, perfectes per a descobrir València d'una forma còmoda i ecològica."
    },
    "home.queofrecemos.sec3-titulo": { es: "Taller:", val: "Taller:" },
    "home.queofrecemos.sec3-texto": {
        es: "realizamos 8 tipos de reparaciones y mantenimientos, desde ajustes básicos hasta restauraciones completas. Nuestro equipo técnico cuida cada detalle para que tu bici quede como nueva.",
        val: "realitzem 8 tipus de reparacions i manteniments, des d'ajustos bàsics fins a restauracions completes. El nostre equip tècnic cuida cada detall perquè la teua bici quede com nova."
    },
    // Venta
    
    // Etiqueta común de precio
    "ventas.precio": { es: "Precio:", val: "Preu:" },

    // Descripciones (carretera-urbanas)
    "ventas.tarmac.desc": {
        es: "No hay nada más rápido que la Tarmac SL8. Aerodinámica, ligereza y una calidad de conducción de otro nivel: es la Tarmac más rápida de la historia.",
        val: "No hi ha res més ràpid que la Tarmac SL8. Aerodinàmica, lleugeresa i una qualitat de conducció d’un altre nivell: és la Tarmac més ràpida de la història."
    },
    "ventas.sirrusx2.desc": {
        es: "La Sirrus X ofrece un recorrido suave con neumáticos anchos, postura cómoda y transmisión monoplato intuitiva. Geometría pensada para cada talla.",
        val: "La Sirrus X oferix un recorregut suau amb pneumàtics amples, postura còmoda i transmissió monoplato intuïtiva. Geometria pensada per a cada talla."
    },
    "ventas.tero5.desc": {
        es: "La Turbo Tero 5.0 EQ es una e-Bike versátil con portabultos, guardabarros y luces. Potencia y confianza para llegar más lejos con total comodidad.",
        val: "La Turbo Tero 5.0 EQ és una e-Bike versàtil amb portaequipatges, parafangs i llums. Potència i confiança per arribar més lluny amb total comoditat."
    },
    "ventas.aerolight.desc": {
        es: "BH Aerolight 6.0: cuadro de carbono ligero, integración total y aerodinámica avanzada para máximo rendimiento en carretera.",
        val: "BH Aerolight 6.0: quadre de carboni lleuger, integració total i aerodinàmica avançada per a màxim rendiment en carretera."
    },
    "ventas.oxford.desc": {
        es: "Oxford Lite: urbana ágil y minimalista, pensada para moverte por la ciudad con estilo y eficiencia.",
        val: "Oxford Lite: urbana àgil i minimalista, pensada per a moure’t per la ciutat amb estil i eficiència."
    },
    "ventas.corestreet.desc": {
        es: "Core Street: urbana cómoda y ligera para desplazamientos diarios. Posición relajada y componentes fiables.",
        val: "Core Street: urbana còmoda i lleugera per a desplaçaments diaris. Posició relaxada i components fiables."
    },

    // Descripciones (montaña)
    "ventas.epicwc.desc": {
        es: "S-Works Epic World Cup: eficiencia, control y ligereza para XC al más alto nivel. Desarrollada con enfoque integral de competición.",
        val: "S-Works Epic World Cup: eficiència, control i lleugeresa per a XC al més alt nivell. Desenvolupada amb enfocament integral de competició."
    },
    "ventas.lynx95.desc": {
        es: "BH Lynx Race 9.5: doble suspensión XC de nivel profesional, cuadro de carbono y componentes de primera para competir al máximo.",
        val: "BH Lynx Race 9.5: doble suspensió XC de nivell professional, quadre de carboni i components de primer nivell per a competir al màxim."
    },

    // Alquiler 


};

  document.querySelectorAll("[data-i18n]").forEach(el => {
    const clave = el.getAttribute("data-i18n");
    if (textos[clave] && textos[clave][lang]) {
      el.textContent = textos[clave][lang];
    }
  });
}
