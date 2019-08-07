<?php

namespace app\Controllers;

class CustomersController extends Controller {
  
  public function getCustomers($request, $response) {
    $message = $this->CustomersModel->getCustomers();
    return json_encode($message);
  }
  
  public function insertCustomers($request, $response) {
    $costumer = $request->getParsedBody();
    $message = $this->CustomersModel->insertCustomers($costumer);
    return json_encode($message);
  }

  public function updateCustomers($request, $response) {
    $costumer = $request->getParsedBody();
    $customerNumber = $request->getAttribute('customerNumber');
    $message = $this->CustomersModel->updateCustomers($customerNumber, $costumer);
    return json_encode($message);
  }

}