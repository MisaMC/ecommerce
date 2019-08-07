import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product';
import { Cart } from '../model/cart';

@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {

  public selectedCategory = null;
  public selectedScale = null;
  public selectedVendor = null;
  public productsPerPage= 12;
  public selectedPage= 1;

  constructor(private productsRespositoryService: ProductRepositoryService, private cart:Cart) {}

  ngOnInit() {
    // console.log(this.getProducts());
  }

  get products(): Product[] {   
    const pageIndex = (this.selectedPage - 1)* this.productsPerPage; 
    return this.productsRespositoryService.getProducts(this.selectedCategory, this.selectedScale, this.selectedVendor)
    .slice(pageIndex, pageIndex + this.productsPerPage);
  }
  get categories():string[]{
    return this.productsRespositoryService.getCategories();
  }

  get scales():string[]{
    return this.productsRespositoryService.getScale();
  }

  get vendors(): string[]{
    return this.productsRespositoryService.getVendor();
  }

  changeCategory(newCategory?: string){
    this.selectedCategory = null;
    this.selectedScale = null;
    this.selectedVendor = null;
    this.selectedPage = 1;
    this.selectedCategory= newCategory;
  }

  changeScale(newScale? : string){
    this.selectedCategory = null;
    this.selectedScale = null;
    this.selectedVendor = null;
    this.selectedPage = 1;
    this.selectedScale = newScale;
  }

  changeVendor(newVendor?: string){
    this.selectedCategory = null;
    this.selectedScale = null;
    this.selectedVendor = null;
    this.selectedPage = 1;
    this.selectedVendor = newVendor;
  }

  get pageNumber(): number[] {
    return Array(Math.ceil(this.productsRespositoryService
    .getProducts(this.selectedCategory,this.selectedScale,this.selectedVendor).length/this.productsPerPage))
    .fill(0).map((x,i)=> i + 1);
  }

  changePage(newNumber: number){
    this.selectedPage = newNumber;
  }

  changePageSize(newSize : number){
    this.productsPerPage= newSize;
    this.changePage(1);
  }

  cartProduct(product: Product){
    return this.cart.addLine(product);
  }  
}
