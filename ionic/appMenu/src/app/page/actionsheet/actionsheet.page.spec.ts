import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ActionsheetPage } from './actionsheet.page';

describe('ActionsheetPage', () => {
  let component: ActionsheetPage;
  let fixture: ComponentFixture<ActionsheetPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(ActionsheetPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
