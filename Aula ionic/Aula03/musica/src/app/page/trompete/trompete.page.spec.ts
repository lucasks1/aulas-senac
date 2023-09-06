import { ComponentFixture, TestBed } from '@angular/core/testing';
import { TrompetePage } from './trompete.page';

describe('TrompetePage', () => {
  let component: TrompetePage;
  let fixture: ComponentFixture<TrompetePage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(TrompetePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
