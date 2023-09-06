import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CalcuradoraPageRoutingModule } from './calcuradora-routing.module';

import { CalcuradoraPage } from './calcuradora.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CalcuradoraPageRoutingModule
  ],
  declarations: [CalcuradoraPage]
})
export class CalcuradoraPageModule {}
