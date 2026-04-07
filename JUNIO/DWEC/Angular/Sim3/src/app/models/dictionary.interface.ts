export interface DictionaryResponse {
    word:       string;
    meanings:   Meaning[];
}

export interface Meaning {
    definitions:  Definition[];
}

export interface Definition {
    definition: string;

}


