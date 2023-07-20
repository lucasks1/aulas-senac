import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './page/home/home.component';
import { InterpolacaoComponent } from './page/interpolacao/interpolacao.component';
import { CondicionalComponent } from './page/condicional/condicional.component';
import { NavbarComponent } from './charepage/navbar/navbar.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    InterpolacaoComponent,
    CondicionalComponent,
    NavbarComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
