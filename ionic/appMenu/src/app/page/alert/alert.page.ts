import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-alert',
  templateUrl: './alert.page.html',
  styleUrls: ['./alert.page.scss'],
})
export class AlertPage implements OnInit {

  constructor( private alertCtrl: AlertController) { }

  ngOnInit() {
  }

  async alert(){
    const alert = await this.alertCtrl.create({
      header:'titulo',
      subHeader:'sub-titulo',
      message:'Mensagem alerta',
      buttons:['OK','Delete','Abrir Modal'],
    }

    )
    await alert.present();

   
  }
  async alertConfirme(){
    const alert = await this.alertCtrl.create({

      header:'confirme',
     
      message:'Mensagem ',
      buttons:[
        {
          text:'cancel',
          role:'cancel',
          cssClass:'seconday',
          handler:() =>{
            console.log('confirm : ok')
          }
        }
      ],
    }

    )
    await alert.present();
   
  }
  async alertPrompt(){
    const alert = await this.alertCtrl.create({
      header:'Acesso Restrito!',
      inputs:[
        {
          name:'email',
          type:'text',
          placeholder:'imforme seu e-mail'

        },

        {
          name:'senha',
          type:'password',
          placeholder:'informe sua senha',

        }
      ],
      buttons:[
        {
          text:'cancel',
          role:'cancel',
          handler:(form)=>{
            console.log(form);
          }
        }
      ]
    }

    )
    await alert.present();
  }


}
