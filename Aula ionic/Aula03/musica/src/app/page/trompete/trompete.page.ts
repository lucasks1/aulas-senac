import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-trompete',
  templateUrl: './trompete.page.html',
  styleUrls: ['./trompete.page.scss'],
})
export class TrompetePage implements OnInit {

  url:any;
  constructor(private domSanitizer:DomSanitizer) { }

  ngOnInit() {
  this.url = this.domSanitizer.bypassSecurityTrustResourceUrl(
    'https://www.sabra.org.br/site/trompete-2/'
  )
  }


}
