import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ContatoComponent } from './page/contato/contato.component';
import { HomeComponent } from './page/home/home.component';
import { SobreComponent } from './page/sobre/sobre.component';

const routes: Routes = [
  { path:'', component : HomeComponent  },
  { path: 'sobre' , component : SobreComponent  },
  { path: 'contato' , component : ContatoComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
