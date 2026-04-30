import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RickMortyResponse } from '../models/rickMorty.interface';

@Injectable({
  providedIn: 'root',
})
export class RickServiceApi {
  private http = inject(HttpClient);

  public getCharacters(): Observable<RickMortyResponse> {
    return this.http.get<RickMortyResponse>(
      'https://rickandmortyapi.com/api/character'
    )
  }

}
