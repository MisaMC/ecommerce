import { Injectable } from '@angular/core';
import { ProductDatasourceService } from './product-datasource.service';
import { Product } from './product';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {

  private products: Product[] = [];
  private categories: string[] = [];
  private scale: string[] = [];
  private vendor: string[] = [];

  constructor(private dataSourceService: ProductDatasourceService) {
    this.dataSourceService.getProducts()
      .subscribe((response: any) => {
        // console.log(response['products']);
        this.products = response['products'];

        //para generar otras listas de los productos donde se ordenansort(), se filran fil() y se mapean map()
        this.categories = response['products'].map(p => p.productLine).filter((c, index,array)=> array.indexOf(c)=== index).sort();
        this.vendor = response['products'].map(p => p.productVendor).filter((c, index,array)=> array.indexOf(c)=== index).sort();
        this.scale = response['products'].map(p => p.productScale).filter((c, index,array)=> array.indexOf(c)=== index).sort();
        //console.log(this.categories);
      });
  }

  getProducts(productLine: string = null, productScale: string = null, productVendor: string = null): Product[]{
    // console.log(this.products);
    return this.products.filter((p)=> (productLine == null || p.productLine === productLine) && 
                                      (productScale == null || p.productScale === productScale) && 
                                      (productVendor == null || p.productVendor === productVendor));
  }
  getCategories(): string[]{
    return this.categories;
  }

  getScale(): string[]{
    return this.scale;
  }
  
  getVendor(): string[]{
     return this.vendor;
  }

  getProductById(productCode :string){
    let productSelected : Product;
    this.products.filter((product: Product)=>{
      if (product.productCode === productCode){
        productSelected = product;
      }
    } );
    return productSelected
  };



}
