export interface RickMortyEpResponse {
    info:    Info;
    results: EpResult[];
}

export interface Info {
    pages: number;
}

export interface EpResult {
    name:       string;
}