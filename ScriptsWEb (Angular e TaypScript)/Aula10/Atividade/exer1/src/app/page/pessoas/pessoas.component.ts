import { Component, OnInit } from '@angular/core';
import { Pessoa } from 'src/app/model/pessoa';
import { PessoaServiceService } from "src/app/model/pessoa-service.service";
@Component({
  selector: 'app-pessoas',
  templateUrl: './pessoas.component.html',
  styleUrls: ['./pessoas.component.css']
})
export class PessoasComponent implements OnInit {

  pessoas: Pessoa[] = [];

  constructor(private service: PessoaServiceService) { }
  ngOnInit(): void {
    this.listarPessoas();
  }

  listarPessoas(): void {

    this.service.getPessoa().subscribe(

      pessoas => {

        this.pessoas = pessoas;
      },
      error => {
        console.log(error);
      }
    )
  }

  deletar(id: any) {
    this.service.excluir(id).subscribe(
      () => {
        alert('Pessoa removida com sussesso');
      },
      (error) => {
        console.log("erro ao excluir", error)
      }
    )
    this.listarPessoas();
  }
}
