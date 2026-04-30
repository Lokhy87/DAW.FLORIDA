import { Component, inject } from '@angular/core';
import { Pokemon } from '../../components/pokemon/pokemon';
import { Photos } from '../../components/photos/photos';
import { PokemonServiceApi } from '../../services/pokemon-service-api';
import { PokemonResponse } from '../../models/pokemon.interface';
import { ChangeDetectorRef } from '@angular/core';

type pokemontype = {
  name: string,
  photo: string,
  sprites: string[]
};

@Component({
  selector: 'app-ejercicio2',
  imports: [Pokemon, Photos],
  templateUrl: './ejercicio2.html',
  styleUrl: './ejercicio2.css',
})
export class Ejercicio2 {
  public pokemonService = inject(PokemonServiceApi);

  public names: string[] = ['Pikachu', 'Bulbasaur', 'Charmander'];
  public pokemonSelec?: pokemontype
  public pokemon: pokemontype[] = [
    { name: '', photo: '', sprites: [] },
    { name: '', photo: '', sprites: [] },
    { name: '', photo: '', sprites: [] },
  ]

  public mode: 'pokemons' | 'detalles' = 'pokemons'; 
  private cdr = inject(ChangeDetectorRef);

  ngOnInit(): void {
    this.loadPokemon();
  }

  public loadPokemon(): void {
    this.names.forEach((nombre, i) => {
      this.pokemonService.getPokemon(nombre).subscribe((response: PokemonResponse) => {
      this.pokemon[i] = {
        name: response.name, 
        photo: response.sprites.front_default,
        sprites: [
          response.sprites.front_default,
          response.sprites.back_default,
          response.sprites.back_default,
          response.sprites.front_shiny
        ]
      } 
      this.cdr.detectChanges(); 
      })
    })
  }

  public selectionPokemon(photo: string): void {
    const findPokemon = this.pokemon.find(p => p.name === photo);
    if (findPokemon) {
      this.pokemonSelec = findPokemon;
      this.mode = 'detalles';
    }
  }
  
  public returnPokemons(): void {
    this.mode = 'pokemons'
  }

}
