import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { PokemonResponse } from '../model/pokemon.interface';

@Injectable({
  providedIn: 'root',
})
export class PokeApi {
  private http = inject(HttpClient);

  public getPokemon(nombre: string): Observable<PokemonResponse> {
    return this.http.get<PokemonResponse>(`https://pokeapi.co/api/v2/pokemon/${nombre}`)
  }
}
