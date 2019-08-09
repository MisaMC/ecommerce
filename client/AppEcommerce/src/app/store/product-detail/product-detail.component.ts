import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Cart } from 'src/app/model/cart';
import { ProductDatasourceService } from 'src/app/model/product-datasource.service';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';
import { PARAMETERS } from '@angular/core/src/util/decorators';
import { Product } from 'src/app/model/product';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

  public productCode : string;

  constructor(public activatedroute: ActivatedRoute, public cart : Cart, private productsRepositoryService: ProductRepositoryService) { }

  ngOnInit() {
    this.activatedroute.params.subscribe((params: any)=> {
      return this.productCode = params['productCode'];
    });
  }

  get product(): Product {
    return this.productsRepositoryService.getProductById(this.productCode);
  }
  
  addCart = () => this.cart.addLine(this.product)

}
