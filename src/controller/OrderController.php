<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';

class OrderController extends Controller
{

  private $productDAO;

  function __construct()
  {
    $this->productDAO = new ProductDAO();
  }

  public function cart()
  {
    if (!empty($_POST['action'])) {
      if ($_POST['action'] === 'update') {
        $this->updateCart();
      }
      if ($_POST['action'] === 'bestellen') {
        $this->updateCart();
        header('Location: index.php?page=order');
        exit();
      }
    }

    if (!empty($_POST['delete'])) {
      $productId = $_POST['delete'];
      if (!empty($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
      }
    }

    if (!empty($_SESSION['cart'])) {
      $this->set('order', $_SESSION['cart']);
    }
  }

  public function order()
  {
  }

  private function updateCart()
  {
    foreach ($_POST['quantity'] as $productId => $quantity) {
      if (!empty($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
      }
    }
  }
}
