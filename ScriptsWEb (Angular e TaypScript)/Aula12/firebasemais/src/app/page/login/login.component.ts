import { Component } from '@angular/core';
import { FirebaseloginService } from 'src/app/model/firebaselogin.service';
import { Route, Router } from '@angular/router';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  email: string = '';
  senha: string = '';
  menssagem: string = '';

  constructor(private service: FirebaseloginService, private router: Router) { }

  login() {
    if (this.email && this.senha) {
      this.service.login(this.email, this.senha).then(
        result => {
          console.log('Usuario logado', result.user);
          this.router.navigate(['/'])
        }
      ).catch(
        error => {
          console.log("Ero ao fazer login", error);
          this.menssagem = 'Erro ao fazer login, Verifique suas credenciais'
        }
      )
    }
    else{
      this.menssagem= 'Preencha todos os campos';
    }
  }

}
