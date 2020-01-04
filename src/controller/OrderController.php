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
}
