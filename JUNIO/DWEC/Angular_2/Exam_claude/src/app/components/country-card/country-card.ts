import { Component, EventEmitter, Input, Output } from '@angular/core';
import { CountryResponse } from '../../models/country.interface';

@Component({
  selector: 'app-country-card',
  imports: [],
  templateUrl: './country-card.html',
  styleUrl: './country-card.css',
})
export class CountryCard {
  public showButton: boolean = false;

  @Input() country: CountryResponse | null = null;
  @Input() capitals: string[] = []; 

  @Output() paisSeleccionado = new EventEmitter<string>();

  public seleccion(): void {
    this.paisSeleccionado.emit(this.country!.region)
  };

}
