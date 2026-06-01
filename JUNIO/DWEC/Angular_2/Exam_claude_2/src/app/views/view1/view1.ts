import { Component, inject } from '@angular/core';
import { PokemonCard } from '../../components/pokemon-card/pokemon-card';
import { PokemonDetail } from '../../components/pokemon-detail/pokemon-detail';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { PokemonResponse } from '../../models/pokemon.interface';
import { PokemonServiceApi } from '../../services/pokemon-service-api';

export interface PokemonData {
  pokemon: PokemonResponse;
  images: string[];
}

@Component({
  selector: 'app-view1',
  imports: [PokemonCard, PokemonDetail, ReactiveFormsModule],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 {
  public pokemonService = inject(PokemonServiceApi);

  public pokemonList: PokemonData[] = [];
  public pokemonSelection: PokemonData | undefined;
  public images: string[] = [];

  public modal: 'inicio' | 'card' | 'detail' = 'inicio'; 

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  });

  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();

    if (data.name != '') {
      this.pokemonService.getPokemon(data.name).subscribe(
        (response: PokemonResponse) => {
          this.pokemonList.push({ 
            pokemon: response,
            images: [
              response.sprites.back_default,
              response.sprites.back_shiny,
              response.sprites.front_default,
              response.sprites.front_shiny,
            ] })
            console.log(response)
          this.reactiveForm.reset();
        }
      )
    }
  }

  public selectionCard(nombre: string): void {
    this.pokemonSelection = this.pokemonList.find(item => item.pokemon.name === nombre);
    this.modal = 'detail';
  }

  public details(): void {
    this.modal = 'card';
  }

  public volver(): void {
    this.modal = 'inicio'; 
  }
}
