<?php

namespace app\Controllers;

class OfficesController extends Controller {
  
  public function getOffices($request, $response) {
    $message = $this->OfficesModel->getOffices();
    return json_encode($message);
  }
  
  public function insertOffices($request, $response) {
    $office = $request->getParsedBody();
    $message = $this->OfficesModel->insertOffices($office);
    return json_encode($message);
  }

  public function updateOffices($request, $response) {
    $office = $request->getParsedBody();
    $officeCode = $request->getAttribute('officeCode');
    $message = $this->OfficesModel->updateOffices($officeCode, $office);
    return json_encode($message);
  }

}