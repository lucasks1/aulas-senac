import { Injectable } from '@angular/core';
import { Pessoa } from './pessoa';
import { HttpClient } from '@angular/common/http'
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PessoaServiceService {
  private baseUrl = "http://localhost:3000/pessoa";
  constructor(private http: HttpClient) { }
  getPessoa(): Observable<Pessoa[]> {
    return this.http.get<Pessoa[]>(this.baseUrl);
  }

  adicinarPessoa(pessoa: Pessoa): Observable<Pessoa> {
    return this.http.post<Pessoa>(this.baseUrl, pessoa);
  }

  getPessoaUnica(id: string) {
    return this.http.get<Pessoa>(this.baseUrl + '/' + id)
  }

  update(pessoa: Pessoa, id: any): Observable<any> {
    return this.http.put(this.baseUrl + '/' + id, pessoa);
  }

  excluir(id: number): Observable<any> {
    return this.http.delete(this.baseUrl + '/' + id);
  }
}
