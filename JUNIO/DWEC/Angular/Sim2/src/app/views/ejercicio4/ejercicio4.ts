import { Component, inject } from '@angular/core';
import { Text } from '../../components/text/text';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { DictionaryServiceApi } from '../../services/dictionary-service-api';
import { Definition } from '../../models/dictionary.interface';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-ejercicio4',
  imports: [ReactiveFormsModule, Text],
  templateUrl: './ejercicio4.html',
  styleUrl: './ejercicio4.css',
})
export class Ejercicio4 {
  public dictionaryServe = inject(DictionaryServiceApi);

  public definitions: Definition[] = [];
  public synonyms: string[] = [];
  public antonyms: string[] = []; 

  public mode: 'inicio' | 'seleccion' | 'definicion' | 'sinonimos' | 'antonimos' = 'inicio'; 

    private cdr = inject(ChangeDetectorRef);

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })

  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();
    if (data.name != '') {
      this.dictionaryServe.getWord(data.name).subscribe((response) => {
          this.definitions = response[0].meanings[0].definitions;
          this.synonyms = response[0].meanings[0].synonyms;
          this.antonyms = response[0].meanings[0].antonyms;
          this.mode = 'seleccion';
          this.reactiveForm.reset()
          console.log(response)
          this.cdr.detectChanges(); 
      })
    }
  }

  public showDefinition(): void {
    this.mode = 'definicion';
  }

  public showSynonyms(): void {
    this.mode = 'sinonimos';
  }
  public showAntonyms(): void {
    this.mode = 'antonimos';
  }

  public volver(): void {
    this.mode = 'seleccion';
  }

  public newSearch(): void {
    this.mode = 'inicio';
    this.reactiveForm.reset();
  }

}
