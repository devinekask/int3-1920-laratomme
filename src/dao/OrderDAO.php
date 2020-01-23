<?php

require_once __DIR__ . '/DAO.php';

class OrderDAO extends DAO
{
  public function insertOrder($data)
  {
    $errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `int3_bi_orders`(`customer_id`, `shipping_type_id`, `payment_type`, `discount_id`)
            VALUES (:customer_id, :shipping_type_id, :payment_type, :discount_id)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':customer_id', $data['customer_id']);
      $stmt->bindValue(':shipping_type_id', $data['shipping_type_id']);
      $stmt->bindValue(':payment_type', $data['payment_type']);
      $stmt->bindValue(':discount_id', $data['discount_id']);
      if ($stmt->execute()) {
        return $this->pdo->lastInsertId();
      }
    }
    return false;
  }

  public function validate($data)
  {
    $errors = [];
    if (empty($data['customer_id'])) {
      $errors['customer_id'] = 'Gelieve een klant in te voeren';
    }
    if (empty($data['shipping_type_id'])) {
      $errors['shipping_type_id'] = 'Gelieve een verzendmethode aan te duiden';
    }
    if (empty($data['payment_type'])) {
      $errors['payment_type'] = 'Gelieve een betaal optie aan te duiden';
    }
    return $errors;
  }
}
