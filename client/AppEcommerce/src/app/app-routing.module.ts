import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StoreComponent } from './store/store.component';
import { CartComponent } from './store/cart/cart.component';
import { CheckoutComponent } from './store/checkout/checkout.component';
import { PageNotFoundComponent } from './store/page-not-found/page-not-found.component';
import { ProductDetailComponent } from './store/product-detail/product-detail.component';
import { OrdersComponent } from './store/orders/orders.component';

const routes: Routes = [
  {path: 'store',
   component: StoreComponent
  },
  {
    path: 'cart',
    component: CartComponent
  },
  { path: 'orders',
   component: OrdersComponent },
  {
    path: 'checkout',
    component: CheckoutComponent
  },
  {
    path: 'product/:productCode',
    component : ProductDetailComponent
  },
  {
    path: '',
    redirectTo : '/store',
    pathMatch : 'full'
  }, 
  {
    path: '**',
    component: PageNotFoundComponent
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { 

}
