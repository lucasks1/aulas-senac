import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SopranoPage } from './soprano.page';

const routes: Routes = [
  {
    path: '',
    component: SopranoPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SopranoPageRoutingModule {}
