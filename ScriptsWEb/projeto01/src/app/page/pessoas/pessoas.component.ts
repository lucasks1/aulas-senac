import { Component, OnInit } from '@angular/core';
import { Pessoa } from 'src/app/model/pessoa';
import { PessoaServiceService } from 'src/app/model/pessoa-service.service';

@Component({
  selector: 'app-pessoas',
  templateUrl: './pessoas.component.html',
  styleUrls: ['./pessoas.component.css']
})
export class PessoasComponent implements OnInit {

  pessoa : Pessoa[]=[];

  constructor(private service: PessoaServiceService){}

  ngOnInit(): void{
    this.listarPessoas();
  }

  listarPessoas() : void{
    this.listarPessoas().subscribe{
      pessoa =>{
        this.pessoa = pessoa;
      },
      error => {
        console.log(error)
      }
      
        
    }
  }
}
