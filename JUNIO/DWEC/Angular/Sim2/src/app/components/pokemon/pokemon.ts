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
 @Input() image: string = '';

 @Output() selectedPokemon = new EventEmitter<string>();

 public selection(): void {
  this.selectedPokemon.emit(this.name);
 }
  
}
