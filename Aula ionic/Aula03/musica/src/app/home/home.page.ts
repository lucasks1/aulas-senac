import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  constructor(private navCrtl: NavController) { }

  exibirBarito() {
    this.navCrtl.navigateForward('barito')
  }

  exibirBateria() {
    this.navCrtl.navigateForward('bateria')
  }

  exibirTrompete() {
    this.navCrtl.navigateForward('trompete')
  }
 exibirSoprano(){
  this.navCrtl.navigateForward('soprano')
 }

}