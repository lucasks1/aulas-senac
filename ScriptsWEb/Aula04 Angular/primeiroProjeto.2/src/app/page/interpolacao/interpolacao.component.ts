import { Component } from '@angular/core';

@Component({
  selector: 'app-interpolacao',
  templateUrl: './interpolacao.component.html',
  styleUrls: ['./interpolacao.component.css']
})

export class InterpolacaoComponent {

  titulo: string = "Aula 4";
  idade: number = 23;
  jogos = ['yugioh'];
  nome: string = "gabriel";

  font: string = "25px";
}
