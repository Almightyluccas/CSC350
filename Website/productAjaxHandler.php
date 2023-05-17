<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

use model\Cart;
require 'model/Cart.php' ;

try{
  $data = json_decode(file_get_contents('php://input'), true);
  $productId = intval($data['productId']);
  $quantity = intval($data['quantity']) ;
  $cart = new Cart() ;
  $cart->addItem(3,$productId,$quantity);
  $productName = $cart->getProductName($productId) ;
  echo $productName;
}catch (Exception $error) {
  error_log('there was a PHP error handling the cart AJAX: '.$error->getMessage() ) ;
}


