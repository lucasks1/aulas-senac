import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  
  {
    path: 'trompete',
    loadChildren: () => import('./page/trompete/trompete.module').then( m => m.TrompetePageModule)
  },
  {
    path: 'bateria',
    loadChildren: () => import('./page/bateria/bateria.module').then( m => m.BateriaPageModule)
  },
  {
    path: 'barito',
    loadChildren: () => import('./page/barito/barito.module').then( m => m.BaritoPageModule)
  },
  {
    path: 'soprano',
    loadChildren: () => import('./page/soprano/soprano.module').then( m => m.SopranoPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
