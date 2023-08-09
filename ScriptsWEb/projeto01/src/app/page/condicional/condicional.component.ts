import { Component } from '@angular/core';

@Component({
  selector: 'app-condicional',
  templateUrl: './condicional.component.html',
  styleUrls: ['./condicional.component.css']
})
export class CondicionalComponent {

  show: boolean = true;
  nome: string = "Gabriel";

  mostrar: boolean = false;

  showMessage: boolean = false;

  mensagem(): void {
    this.showMessage = !this.showMessage;
  }

}
