import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

const PROTOCOL = 'http';
const PORT = '8888';

@Injectable({
  providedIn: 'root'
})
export class ProductDatasourceService {

  private baseUrl: string;

  constructor(private httpClient: HttpClient) {
    this.baseUrl = `${ PROTOCOL }://${ location.hostname }:${PORT}/ecommerce-project/api`;
  }

  getProducts(): any {
    return this.httpClient.get(`${ this.baseUrl }/products`);
  }

}
