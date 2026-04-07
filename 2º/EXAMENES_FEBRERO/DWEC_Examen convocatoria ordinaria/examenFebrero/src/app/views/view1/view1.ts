import { Component, inject, OnInit } from '@angular/core';
import { Carousel } from '../../components/carousel/carousel';
import { Pokemon } from '../../components/pokemon/pokemon';
import { PokeApi } from '../../services/poke-api';
import { PokemonResponse } from '../../model/pokemon.interface';


@Component({
  selector: 'app-view1',
  imports: [Carousel, Pokemon],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 implements OnInit{
  public pokemonService = inject(PokeApi);

  public name: string = '';
  public photo: string = '';
  
  public loadPokemon(): void {
    this.pokemonService.getPokemon('ditto').subscribe((response: PokemonResponse) => {
      this.name = response.name
      this.photo = response.sprites.front_default;
      console.log(this.photo)
    })
  }
  
  public ngOnInit(){
    this.loadPokemon();
  }
}
