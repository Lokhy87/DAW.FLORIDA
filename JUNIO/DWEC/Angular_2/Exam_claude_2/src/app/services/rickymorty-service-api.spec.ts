import { TestBed } from '@angular/core/testing';

import { RickymortyServiceApi } from './rickymorty-service-api';

describe('RickymortyServiceApi', () => {
  let service: RickymortyServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RickymortyServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
