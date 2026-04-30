export interface DictionaryResponse {
    word:       string;
    meanings:   Meaning[];
}

export interface Meaning {
    definitions:  Definition[];
    synonyms:     string[];
    antonyms:     string[];
}

export interface Definition {
    definition: string;
}

