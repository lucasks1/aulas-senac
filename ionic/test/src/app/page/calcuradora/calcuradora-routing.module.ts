import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CalcuradoraPage } from './calcuradora.page';

const routes: Routes = [
  {
    path: '',
    component: CalcuradoraPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class CalcuradoraPageRoutingModule {}
