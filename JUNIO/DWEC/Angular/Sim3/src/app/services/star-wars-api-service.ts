import { inject, Injectable } from '@angular/core';
import { StarwarsResponse } from '../models/sW.interface';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { SwCharactersResponse } from '../models/swCharacters.interface';

@Injectable({
  providedIn: 'root',
})
export class StarWarsApiService {

  private http = inject(HttpClient);

  public getfilm(id: string): Observable<StarwarsResponse> {
    return this.http.get<StarwarsResponse>(
      `https://swapi.dev/api/films/${id}`
    )
  }

  public getCharacters(url: string): Observable<SwCharactersResponse> {
    return this.http.get<SwCharactersResponse>(url)
  }

}
