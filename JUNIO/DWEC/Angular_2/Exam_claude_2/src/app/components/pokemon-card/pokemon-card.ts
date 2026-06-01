import { Component, EventEmitter, Input, Output } from '@angular/core';
import { PokemonResponse } from '../../models/pokemon.interface';

@Component({
  selector: 'app-pokemon-card',
  imports: [],
  templateUrl: './pokemon-card.html',
  styleUrl: './pokemon-card.css',
})
export class PokemonCard {
  @Input() public pokemon!: PokemonResponse;
  @Input() public images: string[] = [];

  @Output() pokemonSeleccionado = new EventEmitter<string>();

  public seleccion(): void {
    this.pokemonSeleccionado.emit(this.pokemon.name)
  };

}
