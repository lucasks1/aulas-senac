import { ComponentFixture, TestBed } from '@angular/core/testing';
import { SopranoPage } from './soprano.page';

describe('SopranoPage', () => {
  let component: SopranoPage;
  let fixture: ComponentFixture<SopranoPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(SopranoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
