import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { LibraryResponse } from '../models/library.interface';

@Injectable({
  providedIn: 'root',
})
export class LibraryServiceApi {
  private http = inject(HttpClient);

  public getBook(title: string): Observable<LibraryResponse> {
    return this.http.get<LibraryResponse>(
     `https://openlibrary.org/search.json?q=${title}` 
    )
  }


}
