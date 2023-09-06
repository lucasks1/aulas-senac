import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { TrompetePageRoutingModule } from './trompete-routing.module';

import { TrompetePage } from './trompete.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    TrompetePageRoutingModule
  ],
  declarations: [TrompetePage]
})
export class TrompetePageModule {}
