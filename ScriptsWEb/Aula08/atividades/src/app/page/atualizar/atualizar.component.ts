import { Component, OnInit } from '@angular/core';

import { ActivatedRoute, Router } from '@angular/router';
import { Pessoa } from 'src/app/model/pessoa';
import { PessoaServiceService } from 'src/app/model/pessoa-service.service';
import { NgForm } from '@angular/forms';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Route } from '@angular/router';
import { group } from '@angular/animations';

@Component({
  selector: 'app-atualizar',
  templateUrl: './atualizar.component.html',
  styleUrls: ['./atualizar.component.css']
})
export class AtualizarComponent implements OnInit {

  pessoaFrom!: FormGroup;

  dados: Pessoa = {
    id: '',
    nome: '',
    idade: '',
    email: '',
    apelido: '',
    senha: ''
  }

  constructor(private route: ActivatedRoute,
    private service: PessoaServiceService,
    private fromBuilder: FormBuilder,
    private router: Router) { }

  ngOnInit(): void {
    this.inicializaForm();

    const id = this.route.snapshot.paramMap.get('id');

    if (id) {
      this.service.getPessoaUnica(id).subscribe(
        (response: Pessoa) => {
          this.dados = response;
        }

      )
    }

  }

  inicializaForm() {
    this.pessoaFrom = this.fromBuilder.group({
      nome: ['', Validators.required],
      idade: ['', Validators.required],
      email: ['', Validators.required, Validators.email],
      apelido: ['', Validators.required],
      senha: ['', Validators.required]

    })
  }

  atualizar(form: NgForm) {

    this.service.update(this.dados, this.dados.id).subscribe(
      (response: any) => {
        console.log('Dados Atualizados com sussesso', response);
        alert('Pessoa atualizada com sussesso');
        this.router.navigate(['/']);
      },
      (error: any) => {
        console.log('Erro ao atualizar', error);
      }
    )
  }
 
}


