import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './product/product.component';
import { TestComponent } from './testsComponent/test.component';
HomeComponent
const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'test', component: TestComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
