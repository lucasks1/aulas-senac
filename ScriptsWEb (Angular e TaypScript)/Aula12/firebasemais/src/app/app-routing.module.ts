import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CadastroComponent } from './page/cadastro/cadastro.component';
import { HomeComponent } from './page/home/home.component';
import { LoginComponent } from './page/login/login.component';


import { AutoguardService } from './model/autoguard.service';

const routes: Routes = [
  {path:'', component:HomeComponent, canActivate:[AutoguardService]},
  {path:'login',component:LoginComponent},
  {path:'registrar', component:CadastroComponent}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
