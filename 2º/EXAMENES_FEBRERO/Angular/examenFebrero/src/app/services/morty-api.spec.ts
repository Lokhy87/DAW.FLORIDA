import { TestBed } from '@angular/core/testing';

import { MortyApi } from './morty-api';

describe('MortyApi', () => {
  let service: MortyApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MortyApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
