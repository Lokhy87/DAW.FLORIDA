import { TestBed } from '@angular/core/testing';

import { RickMortyServiceApi } from './rick-morty-service-api';

describe('RickMortyServiceApi', () => {
  let service: RickMortyServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RickMortyServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
