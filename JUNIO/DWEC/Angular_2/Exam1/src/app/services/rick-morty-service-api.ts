import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RickMortyResponse } from '../models/rickMorty.interface';
import { RickMortyEpResponse } from '../models/rickMortyEp.interface';

@Injectable({
  providedIn: 'root',
})
export class RickMortyServiceApi {
  private http = inject(HttpClient);

  public getCharacter(): Observable<RickMortyResponse> {
    return this.http.get<RickMortyResponse>(
      'https://rickandmortyapi.com/api/character'
    )
  }

  public getEpisode(): Observable<RickMortyEpResponse> {
    return this.http.get<RickMortyEpResponse>(
      'https://rickandmortyapi.com/api/episode'
    )
  }

}
