// Interfaz que representa la respuesta COMPLETA del endpoint
// https://rickandmortyapi.com/api/episode?page=X
export interface RickyMortyEpisode {

    // Información de paginación de la API
    info: Info;

    // Array de episodios obtenidos en la página actual
    results: EpisodeResult[];
}

// Información de paginación
// Tiene la misma estructura que en personajes
export interface Info {

    // Número total de páginas disponibles
    pages: number;
}

// Modelo de un episodio INDIVIDUAL
export interface EpisodeResult {

    // Nombre del episodio (se muestra en el Carousel)
    name: string;

    // Código del episodio (ej: S01E01)
    // Útil para identificarlo, aunque no siempre se muestre
    episode: string;

    // Array de URLs de personajes que aparecen en el episodio
    // En este ejercicio NO se usa, pero forma parte de la API real
    characters: string[];
}

