import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-barito',
  templateUrl: './barito.page.html',
  styleUrls: ['./barito.page.scss'],
})
export class BaritoPage implements OnInit {
  url:any;
  constructor(private domSantizer:DomSanitizer) { }
  
  ngOnInit() {
  this.url = this.domSantizer.bypassSecurityTrustResourceUrl(
    'https://pt.wikipedia.org/wiki/Bar%C3%ADtono'
  )
  }

}
