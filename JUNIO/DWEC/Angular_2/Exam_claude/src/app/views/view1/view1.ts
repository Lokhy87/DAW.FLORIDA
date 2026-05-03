import { ChangeDetectorRef, Component, inject } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { CountryCard } from '../../components/country-card/country-card';
import { CountryServiceApi } from '../../services/country-service-api';
import { CountryResponse } from '../../models/country.interface';
import { RegionResponse } from '../../models/region.interface';

export interface CountryCapitals {
  country: CountryResponse;
  capitals: string[];
}

@Component({
  selector: 'app-view1',
  imports: [ReactiveFormsModule, CountryCard],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 {

  public countryService = inject(CountryServiceApi)

  public countryInt: CountryCapitals[] = [];
  public capitals: string[] = [];

  private cdr = inject(ChangeDetectorRef);

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  });

  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();
    
    if (data.name != '') {
      this.countryService.getCountry(data.name).subscribe(
        (response: CountryResponse[]) => {
          this.countryInt.push({ country: response[0], capitals: [] })
          this.reactiveForm.reset();
          this.cdr.detectChanges();
        }
      )
    }
  }

  public showRegion(region: string, index: number): void {
    this.countryService.getRegion(region).subscribe((response: RegionResponse[]) => {
      this.countryInt[index].capitals = response.map(item => item.capital[0])
      this.cdr.detectChanges();
    })
  }

}
