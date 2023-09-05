import { Component } from '@angular/core';
@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  public appPages = [
    { title: 'Inbox', url: '/folder/inbox', icon: 'mail' },
    { title: 'Navegação', url: 'navegacao', icon: 'paper-plane' },
    { title: 'Alert', url: 'alert', icon: 'chatbox' },
    { title: 'Toast', url: 'toast', icon: 'chatbubble' },
    { title: 'Action-sheet', url: 'actionsheet', icon: 'construct' },
    { title: 'Badge', url: 'badge', icon: 'albums' },
    { title: 'Card', url: 'card', icon: 'albums' },
    { title: 'Checkbox', url: 'checkbox', icon: 'albums' },
    { title: 'Input', url: 'input', icon: 'chatbox' },
   
  ];
  public labels = ['Family', 'Friends', 'Notes', 'Work', 'Travel', 'Reminders'];
  constructor() {}
}
