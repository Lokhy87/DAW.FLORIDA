import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { CountryResponse } from '../models/country.interface';
import { RegionResponse } from '../models/region.interface';

@Injectable({
  providedIn: 'root',
})
export class CountryServiceApi {
  private http = inject(HttpClient);

  public getCountry(country: string): Observable<CountryResponse[]> {
    return this.http.get<CountryResponse[]>(
      `https://restcountries.com/v3.1/name/${country}`
    )
  }

  public getRegion(region: string): Observable<RegionResponse[]> {
    return this.http.get<RegionResponse[]>(
      `https://restcountries.com/v3.1/region/${region}`
    )
  }

  

}
