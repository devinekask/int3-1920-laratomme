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
    if (empty($_SESSION['filter']) || (!empty($_GET['action']) && $_GET['action'] == 'reset_filter')) {
      $_SESSION['filter'] = array();
    }

    if (!empty($_GET['action']) && $_GET['action'] == 'filter') {
      $_SESSION['filter']['search'] = !empty($_GET['search']) ? $_GET['search'] : null;
      $_SESSION['filter']['price'] = !empty($_GET['price']) ? $_GET['price'] : null;
      $_SESSION['filter']['categories'] = !empty($_GET['categories']) ? $_GET['categories'] : null;
    }

    $maxprice = $this->productDAO->getMaxPrice();
    $this->set('maxprice', round($maxprice['price'], -2));

    $products = $this->productDAO->selectAllWithFilter($_SESSION['filter']);
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
