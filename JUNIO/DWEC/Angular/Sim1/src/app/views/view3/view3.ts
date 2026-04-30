import { Component, inject } from '@angular/core';
import { Card } from '../../components/card/card';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { SwServiceApi } from '../../services/sw-service-api';
import { StarWarsCharacterResponse, StarWarsCharacter } from '../../models/sW.interface';
import { StarWarsFilmsResponse } from '../../models/sWfilms.interface';
import { ChangeDetectorRef } from '@angular/core';


@Component({
  selector: 'app-view3',
  imports: [ReactiveFormsModule, Card],
  templateUrl: './view3.html',
  styleUrl: './view3.css',
})
export class View3 {

  public swService = inject(SwServiceApi);
  public mode: 'Form' | 'Result' = 'Form';
  private cdr = inject(ChangeDetectorRef);

  public results: {
    character: StarWarsCharacter;
    films: StarWarsFilmsResponse[]
    }[] = []

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })

  public onSubmit(): void {
    const data = this.reactiveForm.getRawValue();

    if (data.name !== '') {
      this.swService.getCharacter(data.name).subscribe(
        (response: StarWarsCharacterResponse) => {
          if (response.results.length > 0) {
            this.mode = 'Result';
            

            const character = response.results[0];
            const films: StarWarsFilmsResponse[] = [];

            for (const url of character.films) {
              this.swService.getFilm(url).subscribe((film) => {
                films.push(film);
                this.cdr.detectChanges();
              });
            }
            this.results.push({
              character: character,
              films: films
            })
            this.reactiveForm.reset();
          }
        }
      );
    }
  }

  public newSearch() {
    this.mode = 'Form'
    this.reactiveForm.reset()
  }

}
