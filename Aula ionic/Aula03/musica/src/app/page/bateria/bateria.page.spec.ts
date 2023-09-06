import { ComponentFixture, TestBed } from '@angular/core/testing';
import { BateriaPage } from './bateria.page';

describe('BateriaPage', () => {
  let component: BateriaPage;
  let fixture: ComponentFixture<BateriaPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(BateriaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
