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
    $data = array();
    if (!empty($_GET['search'])) {
      $data['search'] = $_GET['search'];
    }
    if (!empty($_GET['price'])) {
      $data['price'] = $_GET['price'];
    }
    if (!empty($_GET['categories'])) {
      $data['categories'] = $_GET['categories'];
    }

    $products = $this->productDAO->selectAllWithFilter($data);
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

    $data = array();
    $data['id'] = $product['id'];
    $data['categories'] = array($product['categorie_id']);
    $similarproducts = $this->productDAO->selectAllWithFilter($data);
    $this->set('similarproducts', $similarproducts);

    $this->set('product', $product);
  }
}
