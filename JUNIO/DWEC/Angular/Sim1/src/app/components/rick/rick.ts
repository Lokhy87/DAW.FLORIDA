import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Result } from '../../models/rick.interface';

@Component({
  selector: 'app-rick',
  imports: [],
  templateUrl: './rick.html',
  styleUrl: './rick.css',
})
export class Rick {

  @Input() rickList: Result[] = [];
  @Input() mortyList: Result[] = [];

  @Input() actualRick: Result | null = null;
  @Input() actualMorty: Result | null = null;

  @Input() mode: string = '';

  @Input() detail: Result | null = null;

  @Output() selectedCharacter = new EventEmitter<Result>();
  @Output() showRickMiniatures = new EventEmitter<void>();
  @Output() showMortyMiniatures = new EventEmitter<void>();
  @Output() backToMenu = new EventEmitter<void>();

  public selection(character: Result): void {
    this.selectedCharacter.emit(character);
  }

  public miniRicky(): void {
    this.showRickMiniatures.emit()
  }

  public miniMorty(): void {
    this.showMortyMiniatures.emit()
  }

  public volver(): void {
    this.backToMenu.emit()
  }

}
