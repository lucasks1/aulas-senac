import { Injectable } from '@angular/core';
import { AngularFireAuth } from '@angular/fire/compat/auth';
@Injectable({
  providedIn: 'root'
})
export class FirebaseloginService {

  constructor(private autenticar: AngularFireAuth) { }

  login(email: string, senha: string) {
    return this.autenticar.signInWithEmailAndPassword(email, senha);
  }

  registro(email: string, senha: string) {
    return this.autenticar.createUserWithEmailAndPassword(email, senha);
  }



  
}
