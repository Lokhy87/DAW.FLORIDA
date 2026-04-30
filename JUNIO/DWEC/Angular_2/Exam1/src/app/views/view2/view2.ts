import { ChangeDetectorRef, Component, inject } from '@angular/core';
import { CharacterCard } from '../../components/character-card/character-card';
import { RickMortyServiceApi } from '../../services/rick-morty-service-api';
import { Result } from '../../models/rickMorty.interface';
import { EpResult } from '../../models/rickMortyEp.interface';

@Component({
  selector: 'app-view2',
  imports: [CharacterCard],
  templateUrl: './view2.html',
  styleUrl: './view2.css',
})
export class View2 {
  public rickMortyService = inject(RickMortyServiceApi); 

  public character!: Result;
  public list: Result[] = [];
  public episodesList: EpResult[] = [];
  public defaultimage: string = 'https://static.wikia.nocookie.net/wiki-de-rick-morty/images/6/60/Rick_and_Morty.png/revision/latest/scale-to-width-down/1440?cb=20210623034924&path-prefix=es';

  public mode: 'inicio' | 'personajes' | 'episodios' = 'inicio'; 
  
  public cdr = inject(ChangeDetectorRef)

  public currentIndex: number = 0;

  ngOnInit(): void {
    this.loadCharacters();
    this.loadEpisode();
  }

  public loadCharacters(): void {
    this.rickMortyService.getCharacter().subscribe((response) => {
      this.list = response.results.slice(0, 10);
      this.character = response.results[0]
      
      this.cdr.detectChanges()
    })
  }

  public loadEpisode(): void {
    this.rickMortyService.getEpisode().subscribe((response) => {
      this.episodesList = response.results.slice(0, 10);
      this.cdr.detectChanges();
    })
  }

  public showCharacters(): void {
    this.mode = 'personajes';
  }
  
  public showEpisodes(): void {
    this.mode = 'episodios'
  }
  public selectImg(character: Result): void {
    this.character = character
  }

}
