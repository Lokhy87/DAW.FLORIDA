import { TestBed } from '@angular/core/testing';

import { PokemonServiceApi } from './pokemon-service-api';

describe('PokemonServiceApi', () => {
  let service: PokemonServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(PokemonServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
