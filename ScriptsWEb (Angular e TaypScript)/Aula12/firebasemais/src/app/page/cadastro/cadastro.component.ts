import { Component } from '@angular/core';
import { FirebaseloginService } from 'src/app/model/firebaselogin.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.component.html',
  styleUrls: ['./cadastro.component.css']
})
export class CadastroComponent {

  email: string = '';
  senha: string = '';
  menssagem: string = '';

  constructor(private service: FirebaseloginService,
    private router:Router) { }
  registrar() {
    if (this.email, this.senha) {
      this.service.registro(this.email, this.senha).then(
        result => {
          console.log('Usuario registrado com sussesso', result.user);
          alert('Cadasto realizado com sussesso');


          this.router.navigate(['/login']);
        }
      ).catch(
        error => {
          console.log('Erro ao tentar se cadastrar', error)
          this.menssagem = 'Erro ao tentar se cadastrar';
        }
      )

    } else {
      this.menssagem = 'Por favor, preencha todos os campos';
    }
  }
}
