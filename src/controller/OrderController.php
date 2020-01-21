<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ShippingTypeDAO.php';
require_once __DIR__ . '/../dao/CustomerDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';
require_once __DIR__ . '/../dao/OrderItemDAO.php';

class OrderController extends Controller
{

  private $shippingTypeDAO;
  private $customerDAO;
  private $orderDAO;
  private $orderItemDAO;

  function __construct()
  {
    $this->shippingTypeDAO = new ShippingTypeDAO();
    $this->customerDAO = new CustomerDAO();
    $this->orderDAO = new OrderDAO();
    $this->orderItemDAO = new OrderItemDAO();
  }

  public function cart()
  {
    if (!empty($_POST['action'])) {
      if ($_POST['action'] === 'update') {
        $this->updateOrderLines();
      }
      if ($_POST['action'] === 'bestellen') {
        $this->updateOrderLines();
        header('Location: index.php?page=order');
        exit();
      }
    }

    if (!empty($_POST['delete'])) {
      $product_variant_id = $_POST['delete'];
      if (!empty($_SESSION['order']['orderlines'][$product_variant_id])) {
        unset($_SESSION['order']['orderlines'][$product_variant_id]);
      }
      $this->updateOrderLines();
      if (count($_SESSION['order']['orderlines']) === 0) {
        $_SESSION['order'] = array();
      }
    }

    if (!empty($_SESSION['order'])) {
      $this->set('order', $_SESSION['order']);
    }
  }

  public function order()
  {
    if (!empty($_POST['action'])) {
      switch ($_POST['action']) {
        case 'information':
          break;
        case 'shipping':
          if (!empty($_POST['email'])) {
            $_SESSION['order']['customer']['email'] = $_POST['email'];
            $_SESSION['order']['customer']['firstname'] = $_POST['firstname'];
            $_SESSION['order']['customer']['lastname'] = $_POST['lastname'];
            $_SESSION['order']['customer']['adres'] = $_POST['adres'];
            $_SESSION['order']['customer']['box'] = $_POST['box'];
            $_SESSION['order']['customer']['city'] = $_POST['city'];
            $_SESSION['order']['customer']['postal'] = $_POST['postal'];
            $_SESSION['order']['customer']['newsletter'] = !empty($_POST['newsletter']);
          }
          $shippingTypes = $this->shippingTypeDAO->selectAll();
          $this->set('shipping_types', $shippingTypes);
          break;
        case 'payment':
          $shippingType = $this->shippingTypeDAO->selectByID($_POST['shipping']);
          $_SESSION['order']['shipping_type'] = $shippingType;
          break;
        case 'complete':
          $_SESSION['order']['payment'] = $_POST['payment'];

          $customerid = $this->customerDAO->insertCustomer($_SESSION['order']['customer']);
          if ($customerid) {
            $data = array();
            $data['customer_id'] = $customerid;
            $data['shipping_type_id'] = $_SESSION['order']['shipping_type']['id'];
            $data['payment_type'] = $_SESSION['order']['payment'];
            $orderid = $this->orderDAO->insertOrder($data);
            if ($orderid) {
              foreach ($_SESSION['order']['orderlines'] as $product_variant_id => $orderline) {
                $data = array();
                $data['order_id'] = $orderid;
                $data['product_variant_id'] = $product_variant_id;
                $data['quantity'] = $orderline['quantity'];
                $this->orderItemDAO->insertOrderItem($data);
              }
            }
          }

          $_SESSION['order'] = array();
          $_SESSION['info'] = 'Je hebt je bestelling afgerond. Binnekort ontvang je je producten.';
          header('Location: index.php');
          exit();
          break;
      }
    }

    if (!empty($_SESSION['order'])) {
      $order = $_SESSION['order'];
      $this->set('order', $order);
    }
  }

  private function updateOrderLines()
  {
    $_SESSION['order']['ordertotal'] = 0;
    $_SESSION['order']['ordercount'] = 0;
    foreach ($_POST['quantity'] as $product_variant_id => $quantity) {
      if (!empty($_SESSION['order']['orderlines'][$product_variant_id])) {
        $price = $_SESSION['order']['orderlines'][$product_variant_id]['variant']['price'];
        $_SESSION['order']['orderlines'][$product_variant_id]['quantity'] = $quantity;
        $_SESSION['order']['ordertotal'] += $price * $quantity;
        $_SESSION['order']['ordercount'] += $quantity;
      }
    }
  }
}
