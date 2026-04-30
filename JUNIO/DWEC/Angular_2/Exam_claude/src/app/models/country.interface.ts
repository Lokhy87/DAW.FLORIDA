export interface CountryResponse {
    region:       string;
    population:   number;
    name:         Name;
    flags:        Flags;
    capital:      string[];
}

export interface Flags {
    png: string;
}

export interface Name {
    official:   string;
}
