import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-soprano',
  templateUrl: './soprano.page.html',
  styleUrls: ['./soprano.page.scss'],
})
export class SopranoPage implements OnInit {

  url:any;
  constructor(private domSantizer: DomSanitizer) { }

  ngOnInit() {
    this.url = this.domSantizer.bypassSecurityTrustResourceUrl(
      'https://pt.wikipedia.org/wiki/Soprano_(desambigua%C3%A7%C3%A3o)'
    )
  }

}
