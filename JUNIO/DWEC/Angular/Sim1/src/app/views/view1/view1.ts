import { Component, inject } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { PokemonServiceApi } from '../../services/pokemon-service-api';
import { PokemonResponse } from '../../models/pokemon.interface';
import { Pokemon } from '../../components/pokemon/pokemon';
import { Carousel } from '../../components/carousel/carousel';

type pokemonHist = {
  name: string;
  photo: string;
  photos: string[];
}

@Component({
  selector: 'app-view1',
  imports: [ReactiveFormsModule, Pokemon, Carousel],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 {

  public pokemonService = inject(PokemonServiceApi);
  
  public name: string = '';
  public photos: string[] = [];
  public photo: string = '';
  public historial: pokemonHist[] = [];
  public modal: boolean = false;
  public pokemonSeleccionado: pokemonHist | null = null;

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })

  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();

    if (data.name != '') {
      this.pokemonService.getPokemon(data.name).subscribe((response: PokemonResponse) => {
        this.photos = [
          response.sprites.front_default,
          response.sprites.back_default,
          response.sprites.front_shiny,
          response.sprites.back_shiny
        ]
        this.reactiveForm.reset();
        this.historial.push({
          name: data.name,
          photo: response.sprites.front_default,
          photos: this.photos
        })
      })
    }
  }

  public selectedPokemon(name: string): void {
    const pokemonEncontrado = this.historial.find(p => p.name === name);
    if (pokemonEncontrado) {
      this.pokemonSeleccionado = pokemonEncontrado;
      this.modal = true;  
    }
  }

  public cerrarModal(): void {
    this.modal = false;
    this.pokemonSeleccionado = null;
  }



}

