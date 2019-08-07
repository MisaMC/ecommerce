<?php

namespace app\Controllers;

class EmployeesController extends Controller {

  function getEmployees($request, $response) {
    $message = $this->EmployeesModel->getEmployees();
    return json_encode($message);
  }

  function insertEmployees($request, $response) {
    $employee = $request->getParsedBody();
    $message = $this->EmployeesModel->insertEmployees($employee);
    return json_encode($message);
  }

  function updateEmployees($request, $response) {
    $employee = $request->getParsedBody();
    $employeeNumber = $request->getAttribute('employeeNumber');
    $message = $this->EmployeesModel->updateEmployees($employeeNumber, $employee);
    return json_encode($message);
  }

  function getEmployee($request, $response) {
    $employeeNumber = $request->getAttribute('employeeNumber');
    $message = $this->EmployeesModel->getEmployee($employeeNumber);
    return json_encode($message);
  }
  
}

?>