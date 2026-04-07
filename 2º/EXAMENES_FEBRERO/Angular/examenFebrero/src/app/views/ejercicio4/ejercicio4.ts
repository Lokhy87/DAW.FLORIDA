import { Component, inject, OnInit } from '@angular/core';
import { Text } from '../../components/text/text';
import { DictionaryApi } from '../../services/dictionary-api';


@Component({
  selector: 'app-ejercicio4',
  standalone: true,
  imports: [Text],
  templateUrl: './ejercicio4.html',
  styleUrl: './ejercicio4.css',
})
export class Ejercicio4 implements OnInit {

  private dictionaryService = inject(DictionaryApi);

  public definition: string = '';
  public synonyms: string = '';
  public antonyms: string = '';

  ngOnInit(): void {
    this.loadDictionary();
  }

  public loadDictionary(): void {
    this.dictionaryService.getsignificate(). subscribe((response) => {
      this.definition = response.definition;
      this.synonyms = response.synonyms;
      this.antonyms = response.antonyms;

    });
  }
}
