import { Component, Input } from '@angular/core';
import { StarWarsCharacter } from '../../models/sW.interface';
import { StarWarsFilmsResponse } from '../../models/sWfilms.interface';

@Component({
  selector: 'app-card',
  imports: [],
  templateUrl: './card.html',
  styleUrl: './card.css',
})
export class Card {
  @Input() character: StarWarsCharacter | null = null;
  @Input() films: StarWarsFilmsResponse[] = []

}
