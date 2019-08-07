<?php

namespace app\Models;

class OrderModel extends Models {

  public function insertOrder($order) {
    $oderNumber = time();
    $lines = $order['cart']['lines'];

    $this->db->pdo->beginTransaction();
    
    $this->db->insert('orders', [
      'orderNumber' => $oderNumber,
      'orderDate' => date('Y-m-d', time()),
      'requiredDate' => date('Y-m-d', time()),
      'status' => 'In Process',
      'customerNumber' => '496'
    ]);

    foreach($lines as $key => $line) {
      $product = $line['product'];
      $quantity = $line['quantity'];

      $sth = $this->db->pdo->prepare('CALL insertOrderDetails(
        :orderNumber, :productCode, :quantityOrdered, :priceEach , :orderLineNumber)'
      );

      $sth->bindParam(':orderNumber', $oderNumber, $this->db->pdo::PARAM_INT);
      $sth->bindParam(':productCode', $product['productCode'], $this->db->pdo::PARAM_STR);
      $sth->bindParam(':quantityOrdered', $quantity, $this->db->pdo::PARAM_STR);
      $sth->bindParam(':priceEach', $product['MSRP'], $this->db->pdo::PARAM_STR);
      $sth->bindParam(':orderLineNumber', $key, $this->db->pdo::PARAM_STR);

      $sth->execute();

      // $this->db->insert('orderdetails', [
      //   'orderNumber' => $oderNumber,
      //   'productCode' => $product['productCode'],
      //   'quantityOrdered' => $quantity,
      //   'priceEach' => $product['MSRP'],
      //   'orderLineNumber' => $key + 1
      // ]);
    }

    if (!is_null($this->db->error()[1])) {
      // Deshace las inserciones en caso de error.
      $this->db->pdo->rollBack();
      return array(
        'success' => false,
        'description' => $this->db->error()[2]
      );
    }

    // Confirmar las inserciones.
    $this->db->pdo->commit();
    return array(
      'success' => true,
      'description' => 'The order was registered'
    );

  }

}

?>