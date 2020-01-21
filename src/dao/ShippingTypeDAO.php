<?php

require_once(__DIR__ . '/DAO.php');

class ShippingTypeDAO extends DAO
{

  public function selectAll()
  {
    $sql = "SELECT * FROM int3_bi_shipping_type";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id)
  {
    $sql = "SELECT * FROM int3_bi_shipping_type WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
