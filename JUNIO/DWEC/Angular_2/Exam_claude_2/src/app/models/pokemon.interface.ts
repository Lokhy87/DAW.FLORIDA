export interface PokemonResponse {
    height:                   number;
    name:                     string;
    sprites:                  Sprites;
    weight:                   number;
}

export interface Sprites {
    back_default:       string;
    back_shiny:         string;
    front_default:      string;
    front_shiny:        string;
}

