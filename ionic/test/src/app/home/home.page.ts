import { Component } from '@angular/core';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  nome:string = 'Gabriel';
  idade:string = '20';
  constructor(private navCTrl:NavController) {}
  sobre(){
      this.navCTrl.navigateForward('sobre')
  }

  calcuradora(){
    this.navCTrl.navigateForward('calcuradora')
  }

}
