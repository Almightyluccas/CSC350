<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);



use \Model\Cart;

require 'model/Cart.php';
try{
  $data = json_decode(file_get_contents('php://input'), true);
  $productId = intval($data['productId']);
  $quantity = intval($data['quantity']) ;
  session_start() ;

  $cart = new Cart() ;
  $cart->addItem($_SESSION['customerId'],$productId,$quantity);
  $productName = $cart->getProductName($productId) ;
  echo $productName;
}catch (Exception $error) {
  error_log('there was a PHP error handling the product AJAX: '.$error->getMessage() ) ;
}



