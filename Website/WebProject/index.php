<?php
/*TODO: Add modal for checkout for keep shopping or go to cart*/



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
}
else if($choice=='cart')
{
	session_start();
	$customerId=$_SESSION['customerId'];
	$cartDB = new Cart ;
	$cartData = $cartDB->getCartData($customerId) ;
	$cartTotalQuantity = $cartDB->getTotalQuantity($customerId) ;
	$cartTotalPrice = $cartDB->getCartTotalPrice($customerId);
	include('view/cartTemplate.php');
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
	session_start();
	$customerId=$_SESSION['customerId'];
	$dbcart=new Cart();
	$dbcart->emptyCart($customerId);
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
	//TODO: CHANGE THE ABOVE PARAMETER FOR FIRSTNAME AND LAST NAME + add field to ask for first and last name
	else
	{
		$message="ERROR: Userid Already In Use";
		include("view/registration.php");
	}
}
else if($choice=="logoff")
{
	session_start();
	session_unset();
	session_destroy();
	setcookie(session_name(),"",time()-1,"/");
	$message='Logoff-Succesfull';
	include('view/login.php');
}
?>
