import { Component, OnInit} from '@angular/core';
import { FormBuilder,FormGroup, Validators } from "@angular/forms";

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})
export class FormularioComponent implements OnInit  {
ngOnInit(): void {
  this.registrar=this.formBuilder.group({
    nome:['',Validators.required],
    idade:['',Validators.required],
    email:['',[Validators.required, Validators.email]],
    apelido:[''],
    senha:['',[Validators.required, Validators.minLength(6)]],

  })
}
registrar:FormGroup;
constructor(private formBuilder:FormBuilder){
  this.registrar= new FormGroup({});
}
enviar(){
  if(this.registrar.valid){
    console.log(JSON.stringify(this.registrar.value))
  }else{
    alert('Preencha todos os campos corretamente.')
  }
}

}
