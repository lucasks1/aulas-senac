import { Injectable } from '@angular/core';
import { Pessoa } from './pessoa';
import{HttpClient}from'@angular/common/http'
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PessoaServiceService {
private baseUrl="http://localhost:3000/pessoa";
  constructor(private http : HttpClient) { }
  getPessoa():Observable<Pessoa[]>{
    return this.http.get<Pessoa[]>(this.baseUrl);
  }
}
