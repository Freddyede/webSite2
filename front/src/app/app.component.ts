import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  products: Object;
  title = 'front';
  constructor(private http: HttpClient) { }
  ngOnInit(): void {
    this.http.get('https://localhost:8000/').subscribe(dataProducts => {
      this.products = dataProducts;
    });

  }
}
