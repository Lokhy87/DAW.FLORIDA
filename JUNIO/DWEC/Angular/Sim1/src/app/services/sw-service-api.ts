import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { StarWarsCharacterResponse } from '../models/sW.interface';
import { StarWarsFilmsResponse } from '../models/sWfilms.interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class SwServiceApi {
  private http = inject(HttpClient);

  public getCharacter(nombre: string): Observable<StarWarsCharacterResponse> {
    return this.http.get<StarWarsCharacterResponse>(
      `https://swapi.dev/api/people/?search=${nombre}`)
  }

  public getFilm(url: string): Observable<StarWarsFilmsResponse> {
    return this.http.get<StarWarsFilmsResponse>(url)
  }

}
