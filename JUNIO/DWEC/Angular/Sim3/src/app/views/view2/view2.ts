import { Component, inject, OnInit } from '@angular/core';
import { Hexagon } from '../../components/hexagon/hexagon';
import { DictionaryApiService } from '../../services/dictionary-api-service';
import { DictionaryResponse } from '../../models/dictionary.interface';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-view2',
  imports: [Hexagon],
  templateUrl: './view2.html',
  styleUrl: './view2.css',
})
export class View2 implements OnInit {

  public dictionaryService = inject(DictionaryApiService);

  public vocales: string[] = [];
  public consonantes: string[] = [];
  public letras: string[] = [];
  public contador: number = 0 

  public generarVocales(): void {
    this.vocales = [];
    while (this.vocales.length < 2) {
      const vocal = 'aeiou';
      const letra = vocal[Math.floor(Math.random() * vocal.length)];
      if (!this.vocales.includes(letra)) {
        this.vocales.push(letra)
      }
    }
  }

  public generarConsonantes(): void {
    this.consonantes = [];
    while (this.consonantes.length < 5) {
      const consonante = 'bcdfghjklmnpqrstvwxyz';
      const letra = consonante[Math.floor(Math.random() * consonante.length)];
      if (!this.consonantes.includes(letra)) {
        this.consonantes.push(letra)
      }
    }
  }

  public generarLetras(): void {
    this.letras = [
      this.consonantes[0],
      this.consonantes[1],
      this.consonantes[2],
      this.vocales[0],
      this.consonantes[3],
      this.consonantes[4],
      this.vocales[1]
    ];
  }

  public ngOnInit() {
    this.generarVocales();
    this.generarConsonantes();
    this.generarLetras();
  }

  public palabra: string = ''; 
  public definition: string = '';

  public anyadirLetra(letra: string): void {
    this.palabra += letra ;
  }


  private cdr = inject(ChangeDetectorRef);

  public getWord(): void {
    this.dictionaryService.getDefinition(this.palabra).subscribe((response: DictionaryResponse[]) => {
      this.definition = response[0].meanings[0].definitions[0].definition
      this.cdr.detectChanges();
      this.contador ++;
    })
  }

  public borrar(): void {
    this.palabra = '';
  }

  public reload(): void {
    this.generarVocales();
    this.generarConsonantes();
    this.generarLetras();
    this.palabra = '';
  }

  
  
  public words(): void {
    if (this.palabra) {
      this.contador ++;
    }
  }
  

}
