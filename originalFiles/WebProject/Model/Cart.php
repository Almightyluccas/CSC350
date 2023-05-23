<?php



namespace originalFiles\WebProject\Model;
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

use mysql_xdevapi\Exception;
use mysqli;

class Cart
{
	private $hostName, $username, $password, $database ;
	function __construct() {
		$this->hostName = 'localhost' ;
		$this->username = 'root';
		$this->password = 'root';
		$this->database = 'csc350';
	}

	function addItem($customerId, $productId, $quantity)
	{
		try {
			$mysqli = new mysqli($this->hostName, $this->username, $this->password, $this->database);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL at addItem() Cart-Class: " . $mysqli->connect_error;
				exit();
			}

			$check_query = "SELECT * FROM csc350.cart WHERE customerId = '$customerId' AND productId = '$productId'";
			$check_result = $mysqli->query($check_query);

			if ($check_result->num_rows > 0) {
				$row = $check_result->fetch_assoc();
				$existingQuantity = $row['quantity'];
				$newQuantity = $existingQuantity + $quantity;

				$update_query = "UPDATE csc350.cart SET quantity = '$newQuantity' WHERE customerId = '$customerId' AND productId = '$productId'";
				$update_result = $mysqli->query($update_query);

				if (!$update_result) {
					error_log("Failed to update item quantity: " . $mysqli->error);
					exit();
				}
			} else {
				// If the product doesn't exist, insert a new record
				$product_query = "SELECT * FROM csc350.products WHERE productId = '$productId'";
				$product_result = $mysqli->query($product_query);
				$product_row = $product_result->fetch_assoc();
				$insert_query = "INSERT INTO csc350.cart (customerId, productId, quantity, price)
                             VALUES (?, ?, ?, ?)";
				$stmt = $mysqli->prepare($insert_query);
				$stmt->bind_param('iiii', $customerId, $productId, $quantity, $product_row['price']);
				$stmt->execute();

				if ($stmt->errno) {
					error_log("Failed to insert item: " . $stmt->error);
					exit();
				}
				$stmt->close();
			}
			$mysqli->close();
		} catch (Exception $error) {
			error_log('There was an error adding Product to the cart (addItem() from Cart Class): ' . $error);
		}
	}

	public function getCartData($customerId) {
		try {
			$connection = mysqli_connect($this->hostName, $this->username, $this->password, $this->database);
			$query = "
                SELECT c.customerId, c.productId, c.quantity, c.price, p.imageUrl, p.productName
                FROM csc350.cart c
                INNER JOIN csc350.products p ON c.productId = p.productId
                WHERE c.customerId = $customerId;
            ";
			$result = mysqli_query($connection, $query);
			$cartData = [];
			if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
					$cartData[] = $row;
				}
			} else {
				error_log("Error: " . mysqli_error($connection));
			}

			// Close the database connection
			mysqli_close($connection);

			return $cartData;
		} catch (Exception $error) {
			// Handle any other exceptions
			error_log("There was an error with getCartData(): " . $error->getMessage());
			return [];
		}
	}

	function emptySingleCartItem($customerId, $productId, $quantity) {


	}
	function emptyAllCartItems($customerId) {
		try{
			$mysqli = new mysqli($this->hostName, $this->username, $this->password, $this->database);
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL at getProductName() Cart-Class: " . $mysqli->connect_error;
				exit();
			}
			$sql = "DELETE FROM csc350.cart WHERE customerId = ? ";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param('i', $customerId);
			$stmt->execute();
		}catch(Exception $error) {
			error_log('there was an error clearing the cart: ' .$error->getMessage()) ;
		}
	}

	function getProductName($productId) {
		try{
			$mysqli = new mysqli($this->hostName, $this->username, $this->password, $this->database);
			if ($mysqli->connect_errno) {
				error_log("Failed to connect to MySQL at getProductName() Cart-Class: " . $mysqli->connect_error) ;
				exit();
			}

			$sql = "SELECT productName FROM csc350.products WHERE productId = '$productId'";
			$result = $mysqli->query($sql);

			if ($result && $result->num_rows > 0) {

				$row = $result->fetch_assoc();
				$productName = $row['productName'];
			}else {
				$productName = null;
			}
			$mysqli->close();
			return $productName ;

		}catch(Exception $error) {
			error_log('There was an error getting the ProductName (getProductName() Cart Class): '
				.$error->getMessage())  ;
		}
		return null ;
	}
	function getItemQuantity($customerId, $productId) {
		$connection = mysqli_connect($this->hostName, $this->username, $this->password, $this->database);
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT quantity FROM csc350.cart WHERE customerId = $customerId AND productId = $productId";
		$result = mysqli_query($connection, $query);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$quantity = $row['quantity'] ;
				mysqli_close($connection);
				return $quantity ;
			}
		} else {
			error_log("Error: " . mysqli_error($connection));
		}
		return 0 ;
	}
	function getTotalQuantity ($customerId) {
		$connection = mysqli_connect($this->hostName, $this->username, $this->password, $this->database);
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT SUM(quantity) AS totalQuantity FROM csc350.cart WHERE customerId = $customerId";
		$result = mysqli_query($connection, $query);
		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$totalQuantity = $row['totalQuantity'];
			mysqli_close($connection);
			return $totalQuantity ;
		} else {
			error_log("Error: " . mysqli_error($connection));
		}
		return 0;
	}

	function getItemPrice($customerId, $productId) {

	}
	function getItemTotalCost($customerId, $productId) {
		return $this->getItemQuantity($customerId, $productId) * $this->getItemPrice($customerId, $productId);
	}

	function getCartTotalPrice($customerId) {


		$connection = mysqli_connect($this->hostName, $this->username, $this->password, $this->database);
		if (!$connection) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$query = "SELECT SUM(quantity * price) AS totalPrice FROM csc350.cart WHERE customerId = $customerId";
		$result = mysqli_query($connection, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$totalPrice = $row['totalPrice'];
			mysqli_close($connection);
			return $totalPrice;
		} else {
			error_log("Error: " . mysqli_error($connection));

		}

		return 0;
	}
}


