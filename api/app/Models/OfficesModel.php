<?php

namespace app\Models;

class OfficesModel extends Models {

  public function getOffices() {
    $result = $this->db->select('offices',[
      'officeCode',
      'city',
      'phone',
      'addressLine1',
      'addressLine2',
      'state',
      'country',
      'postalCode',
      'territory'
    ]);

    // !Conexion.
    if (!is_null($this->db->error()[1])) {
      return array('error' => true,'description' => $this->db->error()[2]);
    } else if (empty($result)) { // sin Datos
      return array('notFound' => true, 'description' => 'The result is empty');
    }

    return array(
      'success' => true,
      'description' => 'The offices were found',
      'employees' => $result
    );
  }

  public function insertOffices($office) {
    $result = $this->db->insert('offices', [
      'officeCode' => $office['officeCode'],
      'city' => $office['city'],
      'phone' => $office['phone'],
      'addressLine1' => $office['addressLine1'],
      'addressLine2' => $office['addressLine2'],
      'state' => $office['state'],
      'country' => $office['country'],
      'postalCode' => $office['postalCode'],
      'territory' => $office['territory']
    ]);

    if (!is_null($this->db->error()[1])) {
      return array(
        'success' => false,
        'description' => $this->db->error()[2]
      );
    }

    return array(
      'success' => true,
      'description' => 'The offices was inserted'
    );
  }

  public function updateOffices($officeCode, $office) {
    $result = $this->db->update('offices', [
      // 'officeCode' => $office['officeCode'],
      'city' => $office['city'],
      'phone' => $office['phone'],
      'addressLine1' => $office['addressLine1'],
      'addressLine2' => $office['addressLine2'],
      'state' => $office['state'],
      'country' => $office['country'],
      'postalCode' => $office['postalCode'],
      'territory' => $office['territory']
    ], ['officeCode'  => $officeCode]);

    if (!is_null($this->db->error()[1])) {
      return array(
        'success' => false,
        'description' => $this->db->error()[2]
      );
    }
    
    return array(
      'success' => true, 
      'description' => 'The office was updated'
    );
  }

}

?>