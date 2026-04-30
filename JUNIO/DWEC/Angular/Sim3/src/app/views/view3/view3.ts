import { ChangeDetectorRef, Component, inject } from '@angular/core';
import { Modal } from '../../components/modal/modal';
import { StarWarsApiService } from '../../services/star-wars-api-service';
import { StarwarsResponse } from '../../models/sW.interface';
import { SwCharactersResponse } from '../../models/swCharacters.interface';

type SW = {
  id: string;
  name: string;
  photo: string;
}

@Component({
  selector: 'app-view3',
  imports: [Modal],
  templateUrl: './view3.html',
  styleUrl: './view3.css',
})
export class View3 {

  public swService = inject(StarWarsApiService);

  public films: SW[] = [
    { id: '1', name: '', photo: 'https://m.media-amazon.com/images/I/81CIXJxQ3TL._AC_UF1000,1000_QL80_.jpg' },
    { id: '2', name: '', photo: 'https://m.media-amazon.com/images/M/MV5BMTkxNGFlNDktZmJkNC00MDdhLTg0MTEtZjZiYWI3MGE5NWIwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg' },
    { id: '3', name: '', photo: 'https://upload.wikimedia.org/wikipedia/en/thumb/b/b2/ReturnOfTheJediPoster1983.jpg/250px-ReturnOfTheJediPoster1983.jpg' },
    { id: '4', name: '', photo: 'https://m.media-amazon.com/images/M/MV5BODVhNGIxOGItYWNlMi00YTA0LWI3NTctZmQxZGUwZDEyZWI4XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg' },
    { id: '5', name: '', photo: 'https://upload.wikimedia.org/wikipedia/an/thumb/8/88/Star_Wars_Episode_II._Attack_Of_The_Clones_P%C3%B3ster.jpg/250px-Star_Wars_Episode_II._Attack_Of_The_Clones_P%C3%B3ster.jpg' },
    { id: '6', name: '', photo: 'https://upload.wikimedia.org/wikipedia/an/3/35/Star_Wars_Episode_III._Revenge_Of_The_Sith_P%C3%B3ster.jpg' }
  ]

  public title: string = '';
  public characters: string[] = [];
  public names: string[] = [];
  public modal: boolean = false; 

  private cdr = inject(ChangeDetectorRef)

  public selectedCharacters(url: string): void {
    this.swService.getCharacters(url).subscribe((response: SwCharactersResponse) => {
      this.names.push(response.name)
      this.cdr.detectChanges();
    })
  }

  public selectFilm(id: string): void {
    this.names = [];
    if (id != '') {
      this.swService.getfilm(id).subscribe((response: StarwarsResponse) => { 
        this.modal = true
        this.title = response.title
        response.characters.forEach(url => this.selectedCharacters(url));
        this.cdr.detectChanges();
        console.log(this.names)
      }
    )};
  }

  public volver(): void {
    this.modal = false;
  }

  
}
