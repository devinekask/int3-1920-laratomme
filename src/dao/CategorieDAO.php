<?php

require_once(__DIR__ . '/DAO.php');

class CategorieDAO extends DAO
{

  public function selectAll()
  {
    $sql = "SELECT * FROM int3_bi_categorie";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
