import { TestBed } from '@angular/core/testing';

import { DictionaryServiceApi } from './dictionary-service-api';

describe('DictionaryServiceApi', () => {
  let service: DictionaryServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DictionaryServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
