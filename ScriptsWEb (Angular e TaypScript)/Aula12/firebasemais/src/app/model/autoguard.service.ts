import { Injectable } from '@angular/core';
import { from } from 'rxjs';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { FirebaseloginService } from './firebaselogin.service';

@Injectable({
  providedIn: 'root'
})
export class AutoguardService {

  constructor(private service: FirebaseloginService,
    private router: Router) { }
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    const token = localStorage.getItem('token');
    if (token && this.service.validarToken()) {
      return true;
    } else {
      this.router.navigate(['/login']), { querryParams: {return: state.url }}
      return false;
    }
  }
}
