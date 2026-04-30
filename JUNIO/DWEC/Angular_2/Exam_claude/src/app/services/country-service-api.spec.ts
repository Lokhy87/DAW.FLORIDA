import { TestBed } from '@angular/core/testing';

import { CountryServiceApi } from './country-service-api';

describe('CountryServiceApi', () => {
  let service: CountryServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(CountryServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
