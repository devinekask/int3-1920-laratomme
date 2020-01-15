<?php

require_once(__DIR__ . '/DAO.php');

class ProductDAO extends DAO
{

  public function selectAll()
  {
    $sql = "SELECT * FROM products";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id)
  {
    $sql = "
      SELECT * FROM `products` WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM `products` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }
}
