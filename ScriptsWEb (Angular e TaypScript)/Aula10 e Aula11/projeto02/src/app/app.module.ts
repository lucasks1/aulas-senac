import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LocalStorageComponent } from './page/local-storage/local-storage.component';


import { FormsModule } from '@angular/forms';
import { TokenComponent } from './page/token/token.component';

import { TokenService } from 'src/app/model/token.service';



@NgModule({
  declarations: [
    AppComponent,
    LocalStorageComponent,
    TokenComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,


  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
