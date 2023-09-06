import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { BateriaPage } from './bateria.page';

const routes: Routes = [
  {
    path: '',
    component: BateriaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class BateriaPageRoutingModule {}
