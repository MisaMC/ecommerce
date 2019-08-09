import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StoreModule } from './store/store.module';
import { HttpClientModule } from '@angular/common/http';
import { CartSummaryComponent } from './store/cart-summary/cart-summary.component';
import { NavComponent } from './store/nav/nav.component';

@NgModule({
  declarations: [
    CartSummaryComponent,
    NavComponent,
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    StoreModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
