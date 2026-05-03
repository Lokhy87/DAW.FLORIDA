export interface LibraryResponse {
    docs:              Doc[];
}

export interface Doc {
    author_name?:          string[];
    first_publish_year?:   number;
    title:                 string;
    cover_i?:              number;
}
