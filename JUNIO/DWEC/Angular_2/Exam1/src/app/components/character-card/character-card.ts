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

  @Output() selectedCharacter = new EventEmitter<void>();

  public selection(): void {
    this.selectedCharacter.emit();
  }
}
