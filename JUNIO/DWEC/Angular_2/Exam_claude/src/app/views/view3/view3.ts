import { ChangeDetectorRef, Component, inject } from '@angular/core';
import { BookCard } from '../../components/book-card/book-card';
import { LibraryServiceApi } from '../../services/library-service-api';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { Doc, LibraryResponse } from '../../models/library.interface';

export interface AllBooks {
  books: Doc[];
  relationalBooks: Doc[]
}

@Component({
  selector: 'app-view3',
  imports: [BookCard, ReactiveFormsModule],
  templateUrl: './view3.html',
  styleUrl: './view3.css',
})
export class View3 {
  public libraryService = inject(LibraryServiceApi)

  public books: AllBooks[] = [];
  public relatedBooks: string[] = [];

  private cdr = inject(ChangeDetectorRef); 


  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })
  
  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();

    if (data.name != '') {
      this.libraryService.getBook(data.name).subscribe((response: LibraryResponse) => {
        this.books.push({ books: [response.docs[0]], relationalBooks: response.docs.slice(1, 5) })
        console.log(response)
        this.reactiveForm.reset()
        this.cdr.detectChanges();  
      })
    }
  }


}




