<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/ProductImagesDAO.php';

class ProductsController extends Controller
{

  private $productDAO;
  private $productImagesDAO;

  function __construct()
  {
    $this->productDAO = new ProductDAO();
    $this->productImagesDAO = new ProductImagesDAO();
  }

  public function index()
  {
    $products = $this->productDAO->selectAll();
    $this->set('products', $products);
  }

  public function detail()
  {
    if (empty($_GET['id']) || !$product = $this->productDAO->selectById($_GET['id'])) {
      $_SESSION['error'] = 'No Product Found';
      header('Location: index.php');
    }

    $productImages = $this->productImagesDAO->selectImagesByProductId($product['id']);

    $this->set('product', $product);
    $this->set('productImages', $productImages);
  }
}
