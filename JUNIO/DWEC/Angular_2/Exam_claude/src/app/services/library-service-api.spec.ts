import { TestBed } from '@angular/core/testing';

import { LibraryServiceApi } from './library-service-api';

describe('LibraryServiceApi', () => {
  let service: LibraryServiceApi;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(LibraryServiceApi);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
