import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-pokemon-card',
  imports: [],
  templateUrl: './pokemon-card.html',
  styleUrl: './pokemon-card.css',
})
export class PokemonCard {
  @Input() name: string = '';
  @Input() photos: string[] = [];
  @Input() height: number = 0;
  @Input() weight: number = 0; 
  @Input() actualPhoto: string = '';

  @Output() pokemonSeleccionado = new EventEmitter<void>()

  public seleccionar(): void {
    this.pokemonSeleccionado.emit()
  }

}
