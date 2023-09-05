import { ComponentFixture, TestBed } from '@angular/core/testing';
import { NavegacaoPage } from './navegacao.page';

describe('NavegacaoPage', () => {
  let component: NavegacaoPage;
  let fixture: ComponentFixture<NavegacaoPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(NavegacaoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
