<?php

namespace app\Models;

class CustomersModel extends Models {

  public function getCustomers() {
    $result = $this->db->select('customers',[
      'customerNumber',
      'customerName',
      'contactLastName',
      'contactFirstName',
      'phone',
      'addressLine1',
      'addressLine2',
      'city',
      'state',
      'postalCode',
      'country',
      'salesRepEmployeeNumber',
      'creditLimit'
    ]);

    // !Conexion.
    if (!is_null($this->db->error()[1])) {
      return array('error' => true,'description' => $this->db->error()[2]);
    } else if (empty($result)) { // sin Datos
      return array('notFound' => true, 'description' => 'The result is empty');
    }

    return array(
      'success' => true,
      'description' => 'The customers were found',
      'employees' => $result
    );
  }

  public function insertCustomers($customer) {
    $result = $this->db->insert('customers', [
      'customerNumber' => $customer['customerNumber'],
      'customerName' => $customer['customerName'],
      'contactLastName' => $customer['contactLastName'],
      'contactFirstName' => $customer['contactFirstName'],
      'phone' => $customer['phone'],
      'addressLine1' => $customer['addressLine1'],
      'addressLine2' => $customer['addressLine2'],
      'city' => $customer['city'],
      'state' => $customer['state'],
      'postalCode' => $customer['postalCode'],
      'country' => $customer['country'],
      'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
      'creditLimit' => $customer['creditLimit']
    ]);

    if (!is_null($this->db->error()[1])) {
      return array(
        'success' => false,
        'description' => $this->db->error()[2]
      );
    }

    return array(
      'success' => true,
      'description' => 'The customers was inserted'
    );
  }

  public function updateCustomers($customerNumber, $customer) {
    $result = $this->db->update('customers', [
      // 'customerNumber' => $customer['customerNumber'],
      'customerName' => $customer['customerName'],
      'contactLastName' => $customer['contactLastName'],
      'contactFirstName' => $customer['contactFirstName'],
      'phone' => $customer['phone'],
      'addressLine1' => $customer['addressLine1'],
      'addressLine2' => $customer['addressLine2'],
      'city' => $customer['city'],
      'state' => $customer['state'],
      'postalCode' => $customer['postalCode'],
      'country' => $customer['country'],
      'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
      'creditLimit' => $customer['creditLimit']
    ], ['customerNumber'  => $customerNumber]);

    if (!is_null($this->db->error()[1])) {
      return array(
        'success' => false,
        'description' => $this->db->error()[2]
      );
    }
    
    return array(
      'success' => true, 
      'description' => 'The customers was updated'
    );
  }

}

?>