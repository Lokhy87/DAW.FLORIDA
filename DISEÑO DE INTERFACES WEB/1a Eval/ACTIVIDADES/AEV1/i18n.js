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

    "ventas.precio": { es: "Precio:", val: "Preu:" },

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

    "ventas.epicwc.desc": {
        es: "S-Works Epic World Cup: eficiencia, control y ligereza para XC al más alto nivel. Desarrollada con enfoque integral de competición.",
        val: "S-Works Epic World Cup: eficiència, control i lleugeresa per a XC al més alt nivell. Desenvolupada amb enfocament integral de competició."
    },
    "ventas.lynx95.desc": {
        es: "BH Lynx Race 9.5: doble suspensión XC de nivel profesional, cuadro de carbono y componentes de primera para competir al máximo.",
        val: "BH Lynx Race 9.5: doble suspensió XC de nivell professional, quadre de carboni i components de primer nivell per a competir al màxim."
    },

    // Alquiler
    "alquiler.titulo": { es: "Alquiler", val: "Lloguer" },
 
    "alquiler.sirrusx3.desc": {
    es: "Ofreciendo una combinación sin precedentes de confort, eficiencia y manejo ágil, la Specialized Sirrus X 3.0 25 destaca en asfalto, tierra y cualquier terreno intermedio.",
    val: "Oferint una combinació sense precedents de confort, eficiència i maneig àgil, la Specialized Sirrus X 3.0 25 destaca en asfalt, terra i qualsevol terreny intermedi."
    },
    "alquiler.sirrusx5.desc": {
    es: "La Specialized Sirrus X 5.0 (2025) es una bicicleta híbrida de alto rendimiento diseñada para quienes buscan comodidad, eficiencia y versatilidad.",
    val: "La Specialized Sirrus X 5.0 (2025) és una bicicleta híbrida d’alt rendiment dissenyada per a qui busca comoditat, eficiència i versatilitat."
    },
    "alquiler.corejet.desc": {
    es: "La BH Core Jet Pro es una bicicleta eléctrica de carretera que combina rendimiento, autonomía y diseño aerodinámico.",
    val: "La BH Core Jet Pro és una bicicleta elèctrica de carretera que combina rendiment, autonomia i disseny aerodinàmic."
    },
    "alquiler.corecross.desc": {
    es: "La BH Core Cross es una bicicleta eléctrica híbrida pensada para quienes combinan ciudad y aventura.",
    val: "La BH Core Cross és una bicicleta elèctrica híbrida pensada per a qui combina ciutat i aventura."
    },
    "alquiler.precioDia": { es: "Precio por día:", val: "Preu per dia:" },
    "alquiler.precioFinDeSemana": { es: "Precio fin de semana (2-3 días):", val: "Preu cap de setmana (2-3 dies):" },

    // Taller
"taller.titulo": { es: "Taller", val: "Taller" },
"taller.subtitulo1": { es: "Tu bici, en las mejores manos", val: "La teua bici, en les millors mans" },
"taller.parrafo1": {
  es: "En el taller de BicisVal cuidamos cada bicicleta como si fuera nuestra. Contamos con un equipo técnico con años de experiencia que trabaja con herramientas profesionales y repuestos originales, para garantizar siempre el mejor resultado.",
  val: "Al taller de BicisVal cuidem cada bicicleta com si fora nostra. Comptem amb un equip tècnic amb anys d'experiència que treballa amb ferramentes professionals i recanvis originals, per a garantir sempre el millor resultat."
},
"taller.parrafo2": {
  es: "Realizamos desde mantenimientos básicos hasta reparaciones completas. Nuestro objetivo es que vuelvas a rodar lo antes posible, con tu bici en perfecto estado y total seguridad.",
  val: "Realitzem des de manteniments bàsics fins a reparacions completes. El nostre objectiu és que tornes a pedalejar al més prompte possible, amb la teua bici en perfecte estat i total seguretat."
},
"taller.subtitulo2": { 
    es: "Tipos de reparaciones que realizamos", 
    val: "Tipus de reparacions que realitzem" },
"taller.rep1": { 
    es: "Ajuste de frenos y cambios", 
    val: "Ajust de frens i canvis" },
"taller.rep2": { 
    es: "Cambio de cubiertas y cámaras", 
    val: "Canvi de cobertes i càmeres" },
"taller.rep3": { 
    es: "Centrado y alineado de ruedas", 
    val: "Centrament i alineació de rodes" },
"taller.rep4": { es: 
    "Sustitución de cadenas, piñones y platos", 
    val: "Substitució de cadenes, pinyons i plats" },
"taller.rep5": { 
    es: "Mantenimiento de suspensión delantera", 
    val: "Manteniment de suspensió davantera" },
"taller.rep6": { es: 
    "Engrase y limpieza completa", 
    val: "Greixat i neteja completa" },
"taller.rep7": { es: 
    "Montaje de accesorios (portabultos, luces, sillines, etc.)", 
    val: "Muntatge d’accessoris (portaequipatges, llums, seients, etc.)" },
"taller.rep8": { es: 
    "Diagnóstico general y revisión de seguridad", 
    val: "Diagnòstic general i revisió de seguretat" },
"taller.subtitulo3": { 
    es: "¿Por qué elegir nuestro taller?", 
    val: "Per què triar el nostre taller?" },
"taller.vent1": { 
    es: "✔ Atención sin cita previa", 
    val: "✔ Atenció sense cita prèvia" },
"taller.vent2": { 
    es: "✔ Presupuestos claros y sin compromiso", 
    val: "✔ Pressupostos clars i sense compromís" },
"taller.vent3": { es: 
    "✔ Repuestos originales y de calidad", val: 
    "✔ Recanvis originals i de qualitat" },
"taller.vent4": { es: 
    "✔ Revisión gratuita con cada reparación", val: 
    "✔ Revisió gratuïta amb cada reparació" },
"taller.vent5": { es: 
    "✔ Servicio rápido: en la mayoría de casos, en menos de 48 horas", 
    val: "✔ Servei ràpid: en la majoria de casos, en menys de 48 hores" },
"taller.parrafo3": {
  es: "Si necesitas ayuda o una revisión urgente, llámanos al 963 123 456 o pásate por nuestra tienda en la Calle de la Paz, 24.",
  val: "Si necessites ajuda o una revisió urgent, telefona’ns al 963 123 456 o passa’t per la nostra botiga al carrer de la Pau, 24."
},
};

  document.querySelectorAll("[data-i18n]").forEach(el => {
    const clave = el.getAttribute("data-i18n");
    if (textos[clave] && textos[clave][lang]) {
      el.textContent = textos[clave][lang];
    }
  });
}
