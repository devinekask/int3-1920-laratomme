<?php

require_once __DIR__ . '/DAO.php';

class OrderItemDAO extends DAO
{
  public function insertOrderItem($data)
  {
    $errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `int3_bi_order_items`(`order_id`, `product_id`, `quantity`)
            VALUES (:order_id, :product_id, :quantity)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':order_id', $data['order_id']);
      $stmt->bindValue(':product_id', $data['product_id']);
      $stmt->bindValue(':quantity', $data['quantity']);
      if ($stmt->execute()) {
        return $this->pdo->lastInsertId();
      }
    }
    return false;
  }

  public function validate($data)
  {
    $errors = [];
    if (empty($data['order_id'])) {
      $errors['order_id'] = 'Gelieve een order id in te geven';
    }
    if (empty($data['product_id'])) {
      $errors['product_id'] = 'Gelieve een product id in te geven';
    }
    if (empty($data['quantity']) && $data['quantity'] > 0) {
      $errors['quantity'] = 'Gelieve een aantal in te geven';
    }

    return $errors;
  }
}
