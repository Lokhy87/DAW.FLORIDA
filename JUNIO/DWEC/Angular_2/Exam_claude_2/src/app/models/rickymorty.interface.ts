export interface RickyMortyResponse {
    info:    Info;
    results: Result[];
}

export interface Info {
    count: number;
    pages: number;
}

export interface Result {
    name:     string;
    status:   Status;
    image:    string;
}

export enum Status {
    Alive = "Alive",
    Dead = "Dead",
    Unknown = "unknown",
}
