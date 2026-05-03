import { Component, EventEmitter, input, Input, Output } from '@angular/core';
import { Doc, LibraryResponse } from '../../models/library.interface';

@Component({
  selector: 'app-book-card',
  imports: [],
  templateUrl: './book-card.html',
  styleUrl: './book-card.css',
})
export class BookCard {
  
  @Input() book: Doc | null = null;
  @Input() books: Doc[] = [];

  public showBooks: Boolean = false;
  

}
