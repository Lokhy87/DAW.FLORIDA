import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
// Interfaces tipadas para cada endpoint
import { RickyMortyResponse } from '../model/rickyMorty-characters.interface';
import { RickyMortyEpisode } from '../model/rickyMorty-episodes.interface';

@Injectable({
  providedIn: 'root',
})
export class MortyApi {
  // Inyección de HttpClient usando inject()
  public http = inject(HttpClient);

  /* Obtiene PERSONAJES desde la API de Rick & Morty
  Endpoint: /api/character?page=X */
  public getPersonaje(page: number): Observable<RickyMortyResponse> {
    return this.http.get<RickyMortyResponse>(
      `https://rickandmortyapi.com/api/character/?npage=${page}`
    )    
  }

  /* Obtiene EPISODIOS desde la API de Rick & Morty
  Endpoint: /api/episode?page=X */
  public getEpisode(page: number): Observable<RickyMortyEpisode> {
    return this.http.get<RickyMortyEpisode>(
      `https://rickandmortyapi.com/api/episode?page=${page}`
    )
  }
}
