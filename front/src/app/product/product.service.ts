import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { product } from '../API/sources.api.services.js';

@Injectable({
  providedIn: 'root'
})
export class HomeService {
  constructor(private http: HttpClient) { }
  getProduct() {
    return this.http.get(product.get);
  }
}
