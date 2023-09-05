import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-actionsheet',
  templateUrl: './actionsheet.page.html',
  styleUrls: ['./actionsheet.page.scss'],
})
export class ActionsheetPage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  public ActionSheetButtons=[
    {
      text:'Delete',
      role:'destructive',
      data:{
        action:'delete'
      }
    },
    {
      text:'Share',
      data:{
        action:'share'
      }
    },
    {
      text:'Cancel',
      role:'cacel',
      data:{
        action:'cancel'
      }
    }
  ]
}
