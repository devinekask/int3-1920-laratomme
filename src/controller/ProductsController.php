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
    if (empty($_SESSION['filter']) || (!empty($_POST['action']) && $_POST['action'] == 'reset_filter')) {
      $_SESSION['filter'] = array();
    }

    if (!empty($_POST['action']) && $_POST['action'] == 'filter') {
      $_SESSION['filter']['search'] = !empty($_POST['search']) ? $_POST['search'] : null;
      $_SESSION['filter']['price'] = !empty($_POST['price']) ? $_POST['price'] : null;
      $_SESSION['filter']['categories'] = !empty($_POST['categories']) ? $_POST['categories'] : null;
    }

    if (!empty($_POST['action']) && $_POST['action'] == 'add') {
      $this->addToCart($_POST['product_variant_id'], 1);
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
      $_SESSION['error'] = 'Er is geen product gevonden.';
      header('Location: index.php');
    }

    if (!empty($_POST['action']) && $_POST['action'] == 'add') {
      $this->addToCart($_POST['product_variant_id'], $_POST['quantity']);
    }

    $data = array();
    $data['id'] = $product['id'];
    $data['categories'] = array($product['categorie_id']);
    $similarproducts = $this->productDAO->selectAllWithFilter($data);
    $this->set('similarproducts', $similarproducts);

    $this->set('product', $product);
  }

  private function addToCart($product_variant_id, $quantity)
  {
    if (empty($product_variant_id) || !$variant = $this->productDAO->selectVariantById($product_variant_id)) {
      $_SESSION['error'] = 'Er is geen product variant gevonden.';
      header('Location: index.php');
      exit();
    }
    if (empty($variant['product_id']) || !$product = $this->productDAO->selectById($variant['product_id'])) {
      $_SESSION['error'] = 'Er is geen product gevonden.';
      header('Location: index.php');
      exit();
    }
    if (empty($_SESSION['order'])) {
      $_SESSION['order'] = array();
      $_SESSION['order']['orderlines'] = array();
    }

    if (!array_key_exists($product_variant_id, $_SESSION['order']['orderlines'])) {
      $_SESSION['order']['orderlines'][$product_variant_id] = $product;
      $_SESSION['order']['orderlines'][$product_variant_id]['variant'] = $variant;
    }


    $amount = $quantity * $variant['price'];
    $_SESSION['order']['orderlines'][$product_variant_id]['quantity'] = !empty($_SESSION['order']['orderlines'][$product_variant_id]['quantity']) ? $_SESSION['order']['orderlines'][$product_variant_id]['quantity'] + $quantity : $quantity;
    $_SESSION['order']['ordertotal'] = !empty($_SESSION['order']['ordertotal']) ? $_SESSION['order']['ordertotal'] + $amount : $amount;
    $_SESSION['order']['ordercount'] = !empty($_SESSION['order']['ordercount']) ? $_SESSION['order']['ordercount'] + $quantity : $quantity;
    $_SESSION['info'] = 'Het product is toegevoegd aan je winkelmandje.<br><a href="index.php?page=cart">Bekijk je winkelmandje<span class="arrow_icon"></a>';
  }
}
