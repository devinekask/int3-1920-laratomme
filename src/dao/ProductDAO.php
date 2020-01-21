<?php

require_once(__DIR__ . '/DAO.php');

class ProductDAO extends DAO
{

  public function selectAllWithFilter($data)
  {
    $sql = "SELECT p.id, p.name, p.description_long, c.name AS categorie, p.thumbnail_url FROM int3_bi_products AS p INNER JOIN int3_bi_categorie AS c ON p.categorie_id = c.id WHERE 1 = 1";

    if (!empty($data['search'])) {
      $sql .= " AND p.name LIKE :search";
    }

    if (!empty($data['categories'])) {
      $sql .= " AND p.categorie_id in (" . implode(",", $data['categories']) . ")";
    }

    if (!empty($data['id'])) {
      $sql .= " AND p.id != :id";
    }

    $sql .= " ORDER BY p.name";

    if (!empty($data['id'])) {
      $sql .= " LIMIT 3";
    }

    $stmt = $this->pdo->prepare($sql);

    if (!empty($data['id'])) {
      $stmt->bindValue(':id', $data['id']);
    }

    if (!empty($data['search'])) {
      $stmt->bindValue(':search', '%' . $data['search'] . '%');
    }

    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $index => $product) {
      $variants = $this->selectVariants($product['id'], !empty($data['price']) ? $data['price'] : 0);
      $products[$index]['variants'] = $variants;
    }
    return $products;
  }

  public function selectById($id)
  {
    $sql = "SELECT p.id, p.name, p.description_long, p.image_url, p.thumbnail_url, c.id AS categorie_id, c.name AS categorie FROM int3_bi_products AS p INNER JOIN int3_bi_categorie AS c ON p.categorie_id = c.id
    WHERE p.id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $variants = $this->selectVariants($id);
    $product['variants'] = $variants;
    return $product;
  }

  public function selectVariants($product_id, $price = 0)
  {
    $sql = "SELECT * FROM int3_bi_product_variants WHERE product_id = :product_id";

    if (!empty($price)) {
      $sql .= " AND price <= :price";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':product_id', $product_id);

    if (!empty($price)) {
      $stmt->bindValue(':price', $price);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectVariantById($id)
  {
    $sql = "SELECT * FROM int3_bi_product_variants WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getMaxPrice()
  {
    $sql = "SELECT MAX(price) AS price FROM int3_bi_product_variants";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
