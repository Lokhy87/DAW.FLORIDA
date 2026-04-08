export interface PokemonResponse {
    name:                     string;
    sprites:                  Sprites;
}

export interface Sprites {
    front_default: string;
    front_shiny: string;
    back_default: string;
    back_shiny: string;
}
