<?php

namespace app\Controllers;

class ProductsController extends Controller {
  
  public function getProducts($request, $response) {
    $message = $this->ProductsModel->getProducts();
    return json_encode($message);
  }
  
  public function insertProducts($request, $response) {
    $product = $request->getParsedBody();
    $message = $this->ProductsModel->insertProducts($product);
    return json_encode($message);
  }

  public function updateProduct($request, $response) {
    $product = $request->getParsedBody();
    $productCode = $request->getAttribute('productCode');
    $message = $this->ProductsModel->updateProduct($productCode, $product);
    return json_encode($message);
  }

}