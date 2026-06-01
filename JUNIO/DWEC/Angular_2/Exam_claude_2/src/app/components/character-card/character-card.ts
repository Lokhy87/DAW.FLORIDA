import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-character-card',
  imports: [],
  templateUrl: './character-card.html',
  styleUrl: './character-card.css',
})
export class CharacterCard {
  @Input() name: string = '';
  @Input() image: string = ''; 
    
  @Output() firsCharacter = new EventEmitter<string>();
  @Output() nextCharacter = new EventEmitter<void>();
  @Output() prevCharacter = new EventEmitter<void>();
  

  public selection(name: string): void {
    this.firsCharacter.emit(name)
  }

  public nextitem(): void {
    this.nextCharacter.emit();
  }

  public prevItem(): void {
    this.prevCharacter.emit();
  }

}
