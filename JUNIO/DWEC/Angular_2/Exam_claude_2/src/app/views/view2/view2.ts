import { Component, inject } from '@angular/core';
import { CharacterCard } from '../../components/character-card/character-card';
import { RickymortyServiceApi } from '../../services/rickymorty-service-api';

@Component({
  selector: 'app-view2',
  imports: [CharacterCard],
  templateUrl: './view2.html',
  styleUrl: './view2.css',
})
export class View2 {
  public rickyMortyService = inject(RickymortyServiceApi);

  public name: string = '';
  public image: string = '';

  public totalImage: string[] = [];
  public totalNames: string[] = [];
  public totalPage: number = 0;

  public currentIndex: number = 0;
  public currentPage: number = 0;

  public getCharacters(): void {
    this.rickyMortyService.getCharacters().subscribe((response) => {
      this.name = response.results[0].name;
      this.image = response.results[0].image; 
      this.totalImage = response.results.map(c => c.image)
      this.totalNames = response.results.map(c => c.name)
      this.totalPage = response.info.pages;
    })
  }

  ngOnInit(): void {
    this.getCharacters(); 
  }

  public nextCharacter(): void {
    this.currentIndex = (this.currentIndex + 1) % this.totalImage.length; 
  }

  public prevCharacter(): void {
    this.currentIndex = (this.currentIndex - 1 + this.totalImage.length) % this.totalImage.length
  }

  public nextPage(): void {
    this.currentPage = (this.currentPage + 1) % this.totalPage.length; 
  }

  public prevPage(): void {
    this.currentPage = (this.currentPage - 1 + this.totalPage.length) % this.totalPage.length
  }
  
}