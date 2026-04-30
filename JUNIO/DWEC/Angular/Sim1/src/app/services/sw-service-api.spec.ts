import { TestBed } from '@angular/core/testing';

import { SwServiceApi } from './sw-service-api';

describe('SwServiceApi', () => {
  let service: SwServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SwServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
