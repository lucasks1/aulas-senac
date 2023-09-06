import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { BaritoPageRoutingModule } from './barito-routing.module';

import { BaritoPage } from './barito.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    BaritoPageRoutingModule
  ],
  declarations: [BaritoPage]
})
export class BaritoPageModule {}
