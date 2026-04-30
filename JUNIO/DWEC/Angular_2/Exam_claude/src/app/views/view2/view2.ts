import { ChangeDetectorRef, Component, inject, OnInit } from '@angular/core';
import { RickServiceApi } from '../../services/rick-service-api';
import { CharacterCard } from '../../components/character-card/character-card';
import { Result } from '../../models/rickMorty.interface';

@Component({
  selector: 'app-view2',
  imports: [CharacterCard],
  templateUrl: './view2.html',
  styleUrl: './view2.css',
})
export class View2 implements OnInit {

  public rickService = inject(RickServiceApi)

  public characters: any[] = []
  public name: string = '';
  public photo: string = '';
  public photos: Result[] = [];
  public selectedPhoto: string = '';

  private cdr = inject(ChangeDetectorRef)

  public mode: 'inicio' | 'imagenes' | 'detalle' = 'inicio'; 

  public getCharacters(): void {
    this.rickService.getCharacters().subscribe((response) => {
      this.name = response.results[0].name;
      this.photo = response.results[0].image;
      this.characters = response.results.slice(0, 5);
      this.cdr.detectChanges();
    })
  }

  ngOnInit(): void {
    this.getCharacters();
  }

  public showPhotos(): void {
    this.photos = this.characters
    this.mode = 'imagenes';
  }

  public showDetail(photo: string): void {
    this.selectedPhoto = photo;
    this.mode = 'detalle';
  }

  public volver(): void {
    this.mode = 'inicio';
  }

}
