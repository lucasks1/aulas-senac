import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-toast',
  templateUrl: './toast.page.html',
  styleUrls: ['./toast.page.scss'],
})
export class ToastPage implements OnInit {

  constructor(private toastCtrl: ToastController) { }

  ngOnInit() {
  }

  async toastSimples(){
    const toast = await this.toastCtrl.create({
      message : 'Toast Simples',
      duration:2000
    }) 
    toast.present()
  }

  async toastOpcoes(){
    const toast = await this.toastCtrl.create({
      header: 'Toast header',
      message: 'Click to Close',
      position: 'top',
      buttons:[
        {
          side:'start',
          icon:'star',
         text:'Favorite',
         handler : ()=> {
          console.log('Favorito');
         } 
        },
        {
          text:'Done',
          role:'cancel',
          handler : () => {
            console.log('Cancelado')
          }
        }
      ]
    })
    toast.present();
  }

}
