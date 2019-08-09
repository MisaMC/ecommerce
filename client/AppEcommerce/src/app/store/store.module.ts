import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StoreComponent } from './store.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { CartSummaryComponent } from './cart-summary/cart-summary.component';
import { Cart } from '../model/cart';
import { CartComponent } from './cart/cart.component';
import { CheckoutComponent } from './checkout/checkout.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { RouterLink, RouterModule } from '@angular/router';
import { ProductDetailComponent } from './product-detail/product-detail.component';

@NgModule({
  declarations: [
    StoreComponent,
    FooterComponent,
    CartComponent,
    CheckoutComponent,
    PageNotFoundComponent,
    ProductDetailComponent
  ],
  imports: [
    CommonModule,
    RouterModule
  ],
  exports: [
    StoreComponent
  ], 
  providers: [
    Cart
  ]
})
export class StoreModule { }
