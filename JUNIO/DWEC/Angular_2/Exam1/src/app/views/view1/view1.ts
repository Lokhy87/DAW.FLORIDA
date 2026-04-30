import { Component, inject } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { PokemonServiceApi } from '../../services/pokemon-service-api';
import { PokemonCard } from '../../components/pokemon-card/pokemon-card';

type historial = {
  name: string;
  photo: string;
  height: number;
  weight: number; 
}

@Component({
  selector: 'app-view1',
  imports: [ReactiveFormsModule, PokemonCard],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 {

  public pokemonService = inject(PokemonServiceApi);

  public name: string = '';
  public selectedPhoto: string = '';
  public photos: string[] = [];
  public pokeHist: historial[] = []
  public height: number = 0;
  public weight: number = 0;

  public mode: 'inicio' | 'error' | 'pokemon' = 'inicio';

  reactiveform = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })

  public onSubmit(): void {
    let data = this.reactiveform.getRawValue(); 

    if (data.name != '') {
      this.pokemonService.getPokemon(data.name).subscribe({
        next: (response) => {
          this.name = response.name;
          this.selectedPhoto = response.sprites.front_default;
          this.photos = [
            response.sprites.front_default,
            response.sprites.back_default
          ];
          this.height = response.height;
          this.weight = response.weight;
          this.mode = 'pokemon';
          this.reactiveform.reset();
          this.pokeHist.push({
            name: response.name,
            photo: response.sprites.front_default,
            height: response.height,
            weight:response.weight
          });
        },
        error: (err) => {
          this.mode = 'error';
        }
      });
    } else {
        this.mode = 'error';
      } 
  }

  public selectPoke(): void {
    if (this.selectedPhoto === this.photos[0]){
      this.selectedPhoto = this.photos[1]
    } else {
      this.selectedPhoto = this.photos[0]
    }
  }

  public newSearch(): void {
    this.mode = 'inicio';
  }


}
