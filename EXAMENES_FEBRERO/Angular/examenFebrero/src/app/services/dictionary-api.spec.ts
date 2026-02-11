import { TestBed } from '@angular/core/testing';

import { DictionaryApi } from './dictionary-api';

describe('DictionaryApi', () => {
  let service: DictionaryApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DictionaryApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
