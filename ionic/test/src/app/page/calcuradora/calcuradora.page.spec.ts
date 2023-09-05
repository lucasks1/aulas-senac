import { ComponentFixture, TestBed } from '@angular/core/testing';
import { CalcuradoraPage } from './calcuradora.page';

describe('CalcuradoraPage', () => {
  let component: CalcuradoraPage;
  let fixture: ComponentFixture<CalcuradoraPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(CalcuradoraPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
