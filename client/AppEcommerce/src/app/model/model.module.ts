import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductDatasourceService } from './product-datasource.service';
import { ProductRepositoryService } from './product-repository.service';

@NgModule({
  declarations: [],
  imports: [
    CommonModule
  ],
  providers: [
    ProductDatasourceService,
    ProductRepositoryService
  ]
})
export class ModelModule { }
