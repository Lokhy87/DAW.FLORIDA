import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DictionaryResponse } from '../models/dictionary.interface';

@Injectable({
  providedIn: 'root',
})
export class DictionaryApiService {
  private http = inject(HttpClient);

  public getDefinition(palabra: string): Observable<DictionaryResponse[]> {
    return this.http.get<DictionaryResponse[]>(
      `https://api.dictionaryapi.dev/api/v2/entries/en/${palabra}` 
    )
  }
}
