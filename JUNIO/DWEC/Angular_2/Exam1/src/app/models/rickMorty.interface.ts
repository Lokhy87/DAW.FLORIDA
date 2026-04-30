export interface RickMortyResponse {
    results: Result[];
}

export interface Info {
    pages: number;
}

export interface Result {
    name:     string;
    status:   Status;
    species:  Species;
    image:    string;
    episode:  string[];
}

export enum Species {
    Alien = "Alien",
    Human = "Human",
}

export enum Status {
    Alive = "Alive",
    Dead = "Dead",
    Unknown = "unknown",
}