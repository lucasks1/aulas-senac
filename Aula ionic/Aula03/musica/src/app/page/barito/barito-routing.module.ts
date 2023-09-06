import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { BaritoPage } from './barito.page';

const routes: Routes = [
  {
    path: '',
    component: BaritoPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class BaritoPageRoutingModule {}
