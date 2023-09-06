import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SopranoPageRoutingModule } from './soprano-routing.module';

import { SopranoPage } from './soprano.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SopranoPageRoutingModule
  ],
  declarations: [SopranoPage]
})
export class SopranoPageModule {}
