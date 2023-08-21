import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InterpolacaoComponent } from './interpolacao.component';

describe('InterpolacaoComponent', () => {
  let component: InterpolacaoComponent;
  let fixture: ComponentFixture<InterpolacaoComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [InterpolacaoComponent]
    });
    fixture = TestBed.createComponent(InterpolacaoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
