import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-bateria',
  templateUrl: './bateria.page.html',
  styleUrls: ['./bateria.page.scss'],
})
export class BateriaPage implements OnInit {

  url:any;
  constructor(private domSantizer: DomSanitizer ) { }

  ngOnInit() {
    this.url = this.domSantizer.bypassSecurityTrustResourceUrl(
      'https://pt.wikipedia.org/wiki/Bateria_(eletricidade)'
    )
  }

}
