import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { TrompetePage } from './trompete.page';

const routes: Routes = [
  {
    path: '',
    component: TrompetePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class TrompetePageRoutingModule {}
