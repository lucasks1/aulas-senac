import { ComponentFixture, TestBed } from '@angular/core/testing';
import { BaritoPage } from './barito.page';

describe('BaritoPage', () => {
  let component: BaritoPage;
  let fixture: ComponentFixture<BaritoPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(BaritoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
