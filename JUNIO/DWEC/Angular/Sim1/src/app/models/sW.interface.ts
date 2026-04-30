export interface StarWarsCharacterResponse {
  results: StarWarsCharacter[];
}

export interface StarWarsCharacter {
  name: string;
  height: string;
  mass: string;
  films: string[];
}

