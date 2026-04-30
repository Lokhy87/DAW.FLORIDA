import { Component, inject } from '@angular/core';
import { Carousel } from '../../components/carousel/carousel';
import { RickMortyServiceApi } from '../../services/rick-morty-service-api';
import { Result } from '../../models/rickMorty.interface';
import { EpResult } from '../../models/rickMortyEp.interface';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-ejercicio3',
  imports: [Carousel],
  templateUrl: './ejercicio3.html',
  styleUrl: './ejercicio3.css',
})
export class Ejercicio3 {
  public rickService = inject(RickMortyServiceApi);

  public characters: Result[] = [];
  public episode: EpResult[] = []

  public currentPage: number = 1;
  public currentIndex: number = 0;
  public totalPages: number = 0;

  public mode: 'characters' | 'episodes' = 'characters';

  private cdr = inject(ChangeDetectorRef);

  ngOnInit(): void {
    this.loadcharacter();
    this.loadEpisode();
  }

  public loadcharacter(): void {
    this.rickService.getCharacter(this.currentPage).subscribe((response) => {
      this.characters = response.results;
      this.totalPages = response.info.pages;
      this.cdr.detectChanges(); 
    })
  }

  public loadEpisode(): void {
    this.rickService.getEpisodes(this.currentPage).subscribe((response) => {
      this.episode = response.results;
      this.totalPages = response.info.pages;
      this.cdr.detectChanges(); 
      console.log(this.episode)
    })
  }

  public prevCharacter(): void {
    if (this.currentIndex === 0 && this.mode === 'characters') {
      this.currentIndex = this.characters.length - 1;
    } else if (this.currentIndex === 0 && this.mode === 'episodes') {
      this.currentIndex = this.episode.length -1;
    } else {
      this.currentIndex --;
    }
  }

  public nextCharacter(): void {
    if (this.currentIndex < this.characters.length - 1 && this.mode === 'characters') {
      this.currentIndex ++;
    } else if (this.currentIndex < this.episode.length - 1 && this.mode === 'episodes') {
      this.currentIndex ++;
    } else {
      this.currentIndex = 0;
    }
  }

  public prevPage(): void {
    if (this.currentPage === 1) {
      this.currentPage = this.totalPages
    } else {
      this.currentPage --
    }
    if (this.mode === 'characters') {
      this.loadcharacter();
    } else {
      this.loadEpisode();
    }
    
  }

  public nextPage(): void {
    if (this.currentPage < this.totalPages) {
      this.currentPage ++;
    } else {
      this.currentPage = 1;
    }
    if (this.mode === 'characters') {
      this.loadcharacter();
    } else {
      this.loadEpisode();
    }
  }

  public showCharacters(): void {
    this.mode = "characters";
    this.currentIndex = 0;
    this.currentPage = 1;
    this.loadcharacter();
  }

  public showEpisode(): void {
    this.mode = "episodes";
    this.currentIndex = 0;
    this.currentPage = 1;
    this.loadEpisode();
  }





}
