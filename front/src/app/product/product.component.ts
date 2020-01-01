import { Component, OnInit } from '@angular/core';
import { ProductService } from './product.service';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

  products: Object;
  constructor(private ProductService: ProductService) { }

  ngOnInit(): void {
    this.ProductService.getProduct().subscribe(dataProducts => {
      this.products = dataProducts;
    });;
  }
}