<?php

require_once(__DIR__ . '/DAO.php');

class ProductImagesDAO extends DAO
{

  public function selectAll()
  {
    $sql = "SELECT * FROM `product_images`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectByProductId($product_id)
  {
    $sql = "SELECT * FROM product_images WHERE product_id = :product_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':product_id', $product_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id)
  {
    $sql = "SELECT * FROM `product_images` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
