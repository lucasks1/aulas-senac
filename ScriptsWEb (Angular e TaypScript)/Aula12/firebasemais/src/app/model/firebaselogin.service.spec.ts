import { TestBed } from '@angular/core/testing';

import { FirebaseloginService } from './firebaselogin.service';

describe('FirebaseloginService', () => {
  let service: FirebaseloginService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(FirebaseloginService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
