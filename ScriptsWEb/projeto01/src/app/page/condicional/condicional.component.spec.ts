import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CondicionalComponent } from './condicional.component';

describe('CondicionalComponent', () => {
  let component: CondicionalComponent;
  let fixture: ComponentFixture<CondicionalComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CondicionalComponent]
    });
    fixture = TestBed.createComponent(CondicionalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
