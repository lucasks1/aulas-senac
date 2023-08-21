import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioComponent } from './page/formulario/formulario.component';
import { ReactiveFormsModule } from "@angular/forms";
import { PessoasComponent } from './page/pessoas/pessoas.component';
import { HttpClientModule } from '@angular/common/http';
import { NovaPessoaComponent } from './page/nova-pessoa/nova-pessoa.component';
import { FormsModule } from "@angular/forms";
import { AtualizarComponent } from './page/atualizar/atualizar.component';

@NgModule({
  declarations: [
    AppComponent,
    FormularioComponent,
    PessoasComponent,
    NovaPessoaComponent,
    AtualizarComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule,
    FormsModule
    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
