<?php

namespace app\Models;

class ProductsModel extends Models {

  public function getProducts() {
    $sth = $this->db->pdo->prepare('SELECT 
     productCode,
     productName,
     productLine,
     productScale,
     productVendor,
     productDescription,
     quantityInStock,
     buyPrice,
     MSRP FROM products');

    $sth->execute();

    if (!is_null($sth->errorInfo()[2]) ) {
      return array(
        'success' => false,
        'description' => $sth->errorInfo()[2]
      );
    } else if (empty($sth)) {
      return array('notFound' => true, 'description' => 'The result is empty');
    }


    return array(
      'success' => true,
      'description' => 'The products were found',
      'products' => $sth->fetchAll($this->db->pdo::FETCH_ASSOC)
    );
    
  }

  public function insertProducts($products) {
    $sth = $this->db->pdo->prepare('INSERT INTO products
      (productCode,
      productName,
      productLine,
      productScale,
      productVendor,
      productDescription,
      quantityInStock,
      buyPrice,
      MSRP
      ) VALUES (:productCode,
      :productName,
      :productLine,
      :productScale,
      :productVendor,
      :productDescription,
      :quantityInStock,
      :buyPrice,
      :MSRP)');

    $sth->bindParam(':productCode', $products['productCode'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productName', $products['productName'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productLine', $products['productLine'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productScale', $products['productScale'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productVendor', $products['productVendor'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productDescription', $products['productDescription'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':quantityInStock', $products['quantityInStock'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':buyPrice', $products['buyPrice'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':MSRP', $products['MSRP'], $this->db->pdo::PARAM_STR);

    $sth->execute();

    if (!is_null($sth->errorInfo()[2]) ) {
      return array(
        'success' => false,
        'description' => $sth->errorInfo()[2]
      );
    }

    return array(
      'success' => true,
      'description' => 'The product was inserted'
    );
  }

  public function updateProduct($productCode, $product) {
    $sth = $this->db->pdo->prepare('UPDATE products
     SET 
      productName = :productName,
      productScale = :productScale,
      productVendor = :productVendor,
      productDescription = :productDescription,
      quantityInStock = :quantityInStock,
      buyPrice = :buyPrice,
      MSRP = :MSRP WHERE productCode = :productCode');

    $sth->bindParam(':productName', $product['productName'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productScale', $product['productScale'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productVendor', $product['productVendor'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productDescription', $product['productDescription'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':quantityInStock', $product['quantityInStock'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':buyPrice', $product['buyPrice'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':MSRP', $product['MSRP'], $this->db->pdo::PARAM_STR);
    $sth->bindParam(':productCode', $productCode, $this->db->pdo::PARAM_STR);

    $sth->execute();

    if (!is_null($sth->errorInfo()[2]) ) {
      return array(
        'success' => false,
        'description' => $sth->errorInfo()[2]
      );
    }
    
    return array(
      'success' => true, 
      'description' => 'The product was updated'
    );
  }

}

?>