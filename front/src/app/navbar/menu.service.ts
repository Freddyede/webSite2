import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { navbar } from '../API/sources.api.services.js';

@Injectable({
  providedIn: 'root'
})
export class MenuService {

  constructor(private http: HttpClient) { }
  getMenu() {
    // get url from menu back up
    return this.http.get(navbar.get);
  }
}
