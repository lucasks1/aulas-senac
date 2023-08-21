import { Component } from '@angular/core';
import { LocalstorageService } from 'src/app/model/localstorage.service';

@Component({
  selector: 'app-local-storage',
  templateUrl: './local-storage.component.html',
  styleUrls: ['./local-storage.component.css']
})
export class LocalStorageComponent {

  key :string='';
  value: string='';

  constructor(private service : LocalstorageService){}

  setItem(){
    if(this.key && this.value){
      this.service.setItem(this.key, this.value);
      this.key='';
      this.value='';
    }
  }

  getItem(){
    if (this.key) {
      const value = this.service.getItem(this.key);
      alert(value || 'item nao encontrado');
      this.key='';
    }
  }

  removeItem(){
    if (this.key) {
      this.service.removeItem(this.key)
      this.key='';
      this.value='';
    }
  }

}
