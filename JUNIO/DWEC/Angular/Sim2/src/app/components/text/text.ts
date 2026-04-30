import { Component, Input } from '@angular/core';
import { Definition } from '../../models/dictionary.interface';

@Component({
  selector: 'app-text',
  imports: [],
  templateUrl: './text.html',
  styleUrl: './text.css',
})
export class Text {

  @Input() definition: Definition[] = [];
  @Input() antonyms: string[] = [];
  @Input() synonyms: string[] = [];

}
