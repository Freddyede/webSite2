import { Component, OnInit } from '@angular/core';
import { HomeService } from './product.service';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class HomeComponent implements OnInit {

  products: Object;
  constructor(private homeServices: HomeService) { }

  ngOnInit(): void {
    this.homeServices.getProduct().subscribe(dataProducts => {
      this.products = dataProducts;
    });;
  }

}
