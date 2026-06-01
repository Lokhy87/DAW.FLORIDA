import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RickyMortyResponse } from '../models/rickymorty.interface';

@Injectable({
  providedIn: 'root',
})
export class RickymortyServiceApi {
  private http = inject(HttpClient);
 
  public getCharacters(): Observable<RickyMortyResponse> {
    return this.http.get<RickyMortyResponse>(
      'https://rickandmortyapi.com/api/character'
    )
  }
  
}
