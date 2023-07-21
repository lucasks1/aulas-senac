import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './page/home/home.component';
import { InterpolacaoComponent } from './page/interpolacao/interpolacao.component';
import { CondicionalComponent } from './page/condicional/condicional.component';
import { NavbarComponent } from './charepage/navbar/navbar.component';
import { PipeComponent } from './page/pipe/pipe.component';

import {MatButtonModule} from '@angular/material/button';
import {MatIconModule} from '@angular/material/icon'




@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    InterpolacaoComponent,
    CondicionalComponent,
    NavbarComponent,
    PipeComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MatButtonModule,
    MatIconModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
