import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CondicionalComponent } from './page/condicional/condicional.component';
import { HomeComponent } from './page/home/home.component';
import { PipeComponent } from './page/pipe/pipe.component';

const routes: Routes = [
  { path:'', component : HomeComponent },
  { path: 'condicional' , component : CondicionalComponent },
  {path: 'pipe' , componet : PipeComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
