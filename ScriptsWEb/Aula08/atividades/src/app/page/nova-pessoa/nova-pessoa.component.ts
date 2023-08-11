import { Component } from '@angular/core';
import { Pessoa } from 'src/app/model/pessoa';
import { PessoaServiceService } from "src/app/model/pessoa-service.service";
import { Router } from '@angular/router';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-nova-pessoa',
  templateUrl: './nova-pessoa.component.html',
  styleUrls: ['./nova-pessoa.component.css']
})
export class NovaPessoaComponent {

  dados : Pessoa = {
    id:'',
    nome:'',
    idade:'',
    email:'',
    apelido:'',
    senha:''
  }

  constructor(private service: PessoaServiceService,
    private router: Router){

    }

    submit(from:NgForm){
      const pessoa = from.value;

      this.service.adicinarPessoa(pessoa).subscribe(
        (response : any)=>{
          console.log('Pessoa cadastrada com sucesso', response)
          alert('Nova pessoa cadastrada');

          this.router.navigate(['']);
        },
        (error:any) => {
          console.log('Erro ao inserir', error)
        }
      )
    }

}
