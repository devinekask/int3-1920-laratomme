<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/CategorieDAO.php';

class ProductsController extends Controller
{

  private $productDAO;
  private $categorieDAO;

  function __construct()
  {
    $this->productDAO = new ProductDAO();
    $this->categorieDAO = new CategorieDAO();
  }

  public function index()
  {
    $products = $this->productDAO->selectAllWithFilter();
    $this->set('products', $products);

    $categories = $this->categorieDAO->selectAll();
    $this->set('categories', $categories);
  }

  public function detail()
  {
    if (empty($_GET['id']) || !$product = $this->productDAO->selectById($_GET['id'])) {
      $_SESSION['error'] = 'No Product Found';
      header('Location: index.php');
    }

    $this->set('product', $product);
  }
}
