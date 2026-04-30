import { Component, EventEmitter, Input, Output } from '@angular/core';
import { RickMortyResponse } from '../../models/rickMorty.interface';

@Component({
  selector: 'app-character-card',
  imports: [],
  templateUrl: './character-card.html',
  styleUrl: './character-card.css',
})
export class CharacterCard {

  @Input() name: string = '';
  @Input() image: string = ''; 

  @Output() selectPhoto = new EventEmitter<string>();

  public selection(image: string): void {
    this.selectPhoto.emit(image)
  }

}
