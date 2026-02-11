// Respuesta del endpoint:
// https://rickandmortyapi.com/api/character?page=X
export interface RickyMortyResponse {

    // Información de paginación
    info: Info;

    // Array de personajes
    results: Result[];
}

// Metadatos de la paginación
export interface Info {

    // Número total de páginas
    pages: number;
}

// Modelo de un personaje individual
export interface Result {

    // Nombre del personaje
    name: string;

    // URL de la imagen del personaje
    image: string;
}



