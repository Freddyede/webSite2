import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  products: Object;
  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    this.http.get('https://localhost:8000/').subscribe(dataProducts => {
      this.products = dataProducts;
    });

  }

}
