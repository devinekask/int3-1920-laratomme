<?php

require_once(__DIR__ . '/DAO.php');

class ProductDAO extends DAO
{

  public function selectAllWithFilter()
  {
    $sql = "SELECT p.id, p.name, p.price, p.description_long, c.name AS categorie, pi.image_url FROM int3_bi_products AS p INNER JOIN int3_bi_categorie AS c ON p.categorie_id = c.id
    LEFT JOIN int3_bi_product_images AS pi ON pi.product_id = p.id AND pi.thumbnail = 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id)
  {
    $sql = "SELECT p.id, p.name, p.price, p.description_long, c.name AS categorie, pi.image_url FROM int3_bi_products AS p INNER JOIN int3_bi_categorie AS c ON p.categorie_id = c.id
    LEFT JOIN int3_bi_product_images AS pi ON pi.product_id = p.id AND pi.thumbnail = 1 WHERE p.id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
