import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-photos',
  imports: [],
  templateUrl: './photos.html',
  styleUrl: './photos.css',
})
export class Photos {

  public pokeSelection: string = ''; 

  @Input() photos?: string[] = [];

  @Output() returnPokemon = new EventEmitter<void>();

  public return(): void {
    this.returnPokemon.emit();
  }

  public miniSelection(photo: string): void {
    this.pokeSelection = photo;
  }

  public clearSelection(): void {
    this.pokeSelection = '';
  }
}
