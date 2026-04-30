import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RickResponse } from '../models/rick.interface';

@Injectable({
  providedIn: 'root',
})
export class RickServiceApi {

  public http = inject(HttpClient);

  public getcharacter(name: string): Observable<RickResponse> {
    return this.http.get<RickResponse>(
      `https://rickandmortyapi.com/api/character/?name=${name}`
    );
  }

}
