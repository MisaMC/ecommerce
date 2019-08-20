import { Injectable } from '@angular/core';
import { ProductDatasourceService } from '../product-datasource.service';
import { Order } from '../order';
import { OrderDatasourceService } from '../order-datasource.service';


@Injectable({
  providedIn: 'root'
})
export class OrdersRepositoryService {

  public orders: Order[] = [];
  public totalPrice: number;

  constructor(private dataSourceService: OrderDatasourceService) {
    this.dataSourceService.getOrders()
      .subscribe((response: any) => {
          console.log(response['orders']);
        this.orders = response['orders'];
      });
  
  }

  getOrders(): Order[] {
    return this.orders;
  }
}