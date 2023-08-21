import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AtualizarComponent } from './page/atualizar/atualizar.component';
import { NovaPessoaComponent } from "./page/nova-pessoa/nova-pessoa.component";
import { PessoasComponent } from './page/pessoas/pessoas.component';

const routes: Routes = [
{path:'',component: PessoasComponent},
{path:'novo',component: NovaPessoaComponent},
{ path: 'atualizar/:id', component: AtualizarComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
