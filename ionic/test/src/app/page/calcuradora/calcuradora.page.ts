import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-calcuradora',
  templateUrl: './calcuradora.page.html',
  styleUrls: ['./calcuradora.page.scss'],
})
export class CalcuradoraPage implements OnInit {

  nu1:number= 0;
  nu2:number= 0;
  constructor() { }

  ngOnInit() {
  }
  exibir(){
    alert(this.nu1 + this.nu2);
    alert(this.nu1 - this.nu2);
    alert(this.nu1 * this.nu2);
    alert(this.nu1 % this.nu2);
  }
}
