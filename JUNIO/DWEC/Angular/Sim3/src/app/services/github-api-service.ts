import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { GitHubResponse } from '../models/github.interface';

@Injectable({
  providedIn: 'root',
})
export class GithubApiService {

  private http = inject(HttpClient);

  public getGitHub(nombre: string): Observable<GitHubResponse> {
    return this.http.get<GitHubResponse>(
      `https://api.github.com/search/users?q=${nombre}`
    );
  }

}
