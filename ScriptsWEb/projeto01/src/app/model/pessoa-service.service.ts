import { Injectable } from '@angular/core';
import { Pessoa } from './pessoa';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PessoaServiceService {

  private class="http://localhost:3000/users";

  constructor(private http : HttpClient) { }

getPessoa() : Observable<Pessoa[]>{
  return this.http.get<Pessoa[]>(this.baseUrl);
}

}
