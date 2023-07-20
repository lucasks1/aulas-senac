import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CondicionalComponent } from './page/condicional/condicional.component';
import { HomeComponent } from './page/home/home.component';

const routes: Routes = [
  { path:'', component : HomeComponent },
  { path: 'condicional' , component : CondicionalComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
