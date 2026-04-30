export interface RickMortyEpResponse {
    results: EpResult[];
}

export interface Info {

    pages: number;

}

export interface EpResult {
    id:         number;
    name:       string;
    air_date:   string;
    episode:    string;

}