import { Component, inject, OnInit } from '@angular/core';
import { Pokemon } from '../../components/pokemon/pokemon';
import { PokeApi } from '../../services/poke-api';
import { PokemonResponse } from '../../model/pokemon.interface';
import { Photos } from '../../components/photos/photos';

type PokemonVM = {
  name: string;
  photo: string;
  sprites4: string[];
};

@Component({
  selector: 'app-ejercicio2',
  imports: [Pokemon, Photos],
  templateUrl: './ejercicio2.html',
  styleUrl: './ejercicio2.css',
})
export class Ejercicio2 implements OnInit {
  private pokemonService = inject(PokeApi);

  public mode: 'list' | 'photos' = 'list';
  public names: string[] = ['pikachu', 'bulbasaur', 'charmander' ]

  public pokemon: PokemonVM[] = [
    { name: '', photo: '', sprites4: [] },
    { name: '', photo: '', sprites4: [] },
    { name: '', photo: '', sprites4: [] }
  ];

  public pokemonSeleccionado?: PokemonVM;

  public photoSel? = '';

  public loadPokemon(): void {    
    this.names.forEach((nombre, i) => {
      this.pokemonService.getPokemon(nombre).subscribe((response: PokemonResponse) => {
        this.pokemon[i] = {
          name: response.name,
          photo: response.sprites.front_default, 
          sprites4: [
            response.sprites.front_default,
            response.sprites.back_default,
            response.sprites.front_shiny,
            response.sprites.back_shiny,
          ].filter(Boolean) as string[],
        }
      });
    });
  }

  public ngOnInit(){
    this.loadPokemon();
  }

  public seleccionar(photo: string): void {
    const encontrado = this.pokemon.find((p) => p.photo == photo);
    
    if (!encontrado) return;
      this.pokemonSeleccionado = encontrado;
      this.mode = 'photos';
  };

  public volverALista(): void {
    this.mode = 'list';
    this.pokemonSeleccionado = undefined;
  }




  
}



