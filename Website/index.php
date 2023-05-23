<?php

/*
 *
 * Warning: Undefined array key "customerId" in C:\xampp\htdocs\CSC350\Website\index.php on line 75

Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds
to your MariaDB server version for the right syntax to use near '' at line 4 in
C:\xampp\htdocs\CSC350\Website\model\Cart.php:78
Stack trace: #0 C:\xampp\htdocs\CSC350\Website\model\Cart.php(78): mysqli_query(Object(mysqli), '\r\n ...')
#1 C:\xampp\htdocs\CSC350\Website\index.php(77): model\Cart->getCartData(NULL) #2 {main} thrown in C:\xampp\htdocs\CSC350\Website\model\Cart.php on line 78
 *
 *
 *
 *
 * */


use model\Login;
use model\Cart;
use model\Products;
require 'model/Cart.php';
require 'model/Products.php';
include('library.php');
include_once('model/Login.php');


$choice=readValue('choice');
$message=readValue('message');

if($choice==null ||$choice=='login')
{
  include('view/login.php');
}
else
  if($choice=='logon')
  {
    $user=readValue('username');
    $pass=readValue('password');
    $db=new Login();

    if(trim($user==""))
    {
      $message='Empty Username';
      $choice=null;
    }
    else if(trim($pass==""))
    {
      $message='Empty Password';
      $choice=null;
    }
    else  if ($db->login($user,$pass))
    {
      if(isset($_SESSION['ON'])) include('checker.php');
      else session_start();
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass;
      $_SESSION['customerId'] = $db->getCustomerId($user) ;

      $_SESSION['ON'] = true;

      $lifetime=600;
      setcookie(session_name(),session_id(),time()+$lifetime,"/");
      $_SESSION['LAST_ACTIVITY'] = time();
      $choice='home';
      header("Location: "."index.php?choice=home");
    }
    else
    {
      $message='Invalid-login';
      $pass=$user='';
      $choice=null;
      include('view/login.php');
    }
  }
  else if($choice=="products")
  {
    {

      $productGen = new Products() ;
      $products = $productGen->getProducts() ;
      include 'view/products.php' ;

    }
  }else if($choice =='singleProduct') {



    $productId = $_GET['productId'] ;
    $routedFrom = $_GET['frm'] ;
    $retrieveProduct = new Products() ;

    $product = $retrieveProduct->getSingleProduct($productId) ;
    include 'view/singleProduct.php' ;

  }
  else if($choice=='cart') {

    session_start() ;
    if (isset($_SESSION['ON'])) {

      $customerId = $_SESSION['customerId'];
      $cartDB = new Cart;
      $cartData = $cartDB->getCartData($customerId);
      $cartTotalQuantity = $cartDB->getTotalQuantity($customerId);


      if ($cartTotalQuantity > 0) {
        $cartTotalPrice = $cartDB->getCartTotalPrice($customerId);
        $cartTotalPriceFormatted = '$' . number_format($cartTotalPrice, 2);
        $cartTotalPrice += $cartTotalPrice * 0.08;
        $cartTotalAfterTaxFormatted = '$' . number_format($cartTotalPrice, 2);
      } else {
        $cartTotalPrice = $cartDB->getCartTotalPrice(0);
        $cartTotalPriceFormatted = '$' . number_format(0, 2);
        $cartTotalPrice += $cartTotalPrice * 0.08;
        $cartTotalAfterTaxFormatted = '$' . number_format(0, 2);
      }


      include('view/cartTemplate.php');
    }else {
      $choice = 'login';
      header("Location: index.php?message=Invalid-Login");
    }
  }
  else if($choice=="home")
  {
    include('view/home.php');
  }
  else if($choice=="about")
  {
    include('view/about.php');
  }
  else if($choice=="thankyou")
  {
    session_start() ;
    $customerId=$_SESSION['customerId'];
    $dbcart=new Cart();
    $dbcart->emptyAllCartItems($customerId);
    include('view/thankyou.php');
  }
  else if($choice=="contact")
  {
    include('view/contact.php');
  }
  else if($choice=="registration")
  {
    include("view/registration.php");
  }
  else if($choice=="register")
  {
    $user=$_GET['username'];
    $pass=$_GET['password'];
    $db=new Login();
    if($db->register($user,$pass)) header("Location: index.php");
    else
    {
      $message="ERROR: Userid Already In Use";
      include("view/registration.php");
    }
  }
  else if($choice=="logoff")
  {
    include('view/logoff.php');
  }
  else if($choice=="logoff2")
  {
    session_start();
    session_unset();
    session_destroy();
    setcookie(session_name(),"",time()-1,"/");
    $message='Logoff-Succesfull';
    include('view/login.php');
  }
?>