import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'folder/Inbox',
    pathMatch: 'full'
  },
  {
    path: 'folder/:id',
    loadChildren: () => import('./folder/folder.module').then( m => m.FolderPageModule)
  },
  {
    path: 'navegacao',
    loadChildren: () => import('./page/navegacao/navegacao.module').then( m => m.NavegacaoPageModule)
  },
  {
    path: 'alert',
    loadChildren: () => import('./page/alert/alert.module').then( m => m.AlertPageModule)
  },
  {
    path: 'toast',
    loadChildren: () => import('./page/toast/toast.module').then( m => m.ToastPageModule)
  },
  {
    path: 'actionsheet',
    loadChildren: () => import('./page/actionsheet/actionsheet.module').then( m => m.ActionsheetPageModule)
  },
  {
    path: 'badge',
    loadChildren: () => import('./page/badge/badge.module').then( m => m.BadgePageModule)
  },
  {
    path: 'card',
    loadChildren: () => import('./page/card/card.module').then( m => m.CardPageModule)
  },
  {
    path: 'checkbox',
    loadChildren: () => import('./page/checkbox/checkbox.module').then( m => m.CheckboxPageModule)
  },
  {
    path: 'input',
    loadChildren: () => import('./page/input/input.module').then( m => m.InputPageModule)
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
