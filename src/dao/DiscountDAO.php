<?php

require_once(__DIR__ . '/DAO.php');

class DiscountDAO extends DAO
{

  public function selectByCode($code)
  {
    $sql = "SELECT d.id, d.code, d.percentage, o.id as order_id
      FROM int3_bi_discount as d
      LEFT JOIN int3_bi_orders as o on o.discount_id = d.id
      WHERE d.code = :code";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':code', $code);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
