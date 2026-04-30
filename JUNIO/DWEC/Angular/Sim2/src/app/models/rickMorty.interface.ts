export interface RickMortyResponse {
    info:    Info;
    results: Result[];
}

export interface Info {
    pages: number;
}

export interface Result {
    name:     string;
    image:    string;
}
