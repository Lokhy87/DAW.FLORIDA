import { Component, EventEmitter, Input, Output } from '@angular/core';
import { NgStyle } from '@angular/common';

@Component({
  selector: 'app-pokemon',
  imports: [NgStyle],
  templateUrl: './pokemon.html',
  styleUrl: './pokemon.css',
})
export class Pokemon {

  @Input() name: string = '';
  @Input() photo: string = '';

  @Output() pokemonSeleccionado = new EventEmitter<string>();

  public seleccionar(): void {
    this.pokemonSeleccionado.emit(this.name)
  }


}
