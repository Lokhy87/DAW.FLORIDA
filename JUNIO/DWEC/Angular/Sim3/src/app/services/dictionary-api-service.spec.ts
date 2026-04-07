import { TestBed } from '@angular/core/testing';

import { DictionaryApiService } from './dictionary-api-service';

describe('DictionaryApiService', () => {
  let service: DictionaryApiService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DictionaryApiService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
