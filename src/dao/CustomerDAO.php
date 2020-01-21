<?php

require_once __DIR__ . '/DAO.php';

class CustomerDAO extends DAO
{
  public function insertCustomer($data)
  {
    $errors = $this->validate($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `int3_bi_customers`(`name`, `last_name`, `email`, `address`, `box`, `postalcode`, `city`, `newsletter`)
            VALUES (:name, :last_name, :email, :address, :box, :postalcode, :city, :newsletter)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $data['firstname']);
      $stmt->bindValue(':last_name', $data['lastname']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':address', $data['adres']);
      $stmt->bindValue(':box', $data['box']);
      $stmt->bindValue(':postalcode', $data['postal']);
      $stmt->bindValue(':city', $data['city']);
      $stmt->bindValue(':newsletter', !empty($data['newsletter']) ? $data['newsletter'] : 0);
      if ($stmt->execute()) {
        return $this->pdo->lastInsertId();
      }
    }
    return false;
  }

  public function validate($data)
  {
    $errors = [];
    if (empty($data['firstname'])) {
      $errors['firstname'] = 'Gelieve een voornaam in te geven';
    }
    if (empty($data['lastname'])) {
      $errors['lastname'] = 'Gelieve een achternaam in te geven';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'Gelieve een email in te geven';
    }
    if (empty($data['adres'])) {
      $errors['adres'] = 'Gelieve een adres in te geven';
    }
    if (empty($data['postal'])) {
      $errors['postal'] = 'Gelieve een postcode in te geven';
    }
    if (empty($data['city'])) {
      $errors['city'] = 'Gelieve een stad in te geven';
    }

    return $errors;
  }
}
