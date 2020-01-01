import { Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ProductComponent } from './product/product.component';

export const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'produits', component: ProductComponent }
];