import { TestBed } from '@angular/core/testing';

import { RickServiceApi } from './rick-service-api';

describe('RickServiceApi', () => {
  let service: RickServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RickServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
