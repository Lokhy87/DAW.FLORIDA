import { NgStyle } from '@angular/common';
import { Component, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-pokemon',
  imports: [NgStyle],
  templateUrl: './pokemon.html',
  styleUrl: './pokemon.css',
})
export class Pokemon {
  @Input() photo: string = '';
  @Input() name: string = ''; 

  @Output() pokemonSeleccionado = new EventEmitter<string>();

  public seleccionar(): void {
    this.pokemonSeleccionado.emit(this.photo)
  }

  

}
