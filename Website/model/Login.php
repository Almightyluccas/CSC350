<?php
namespace model;

use mysqli;

class Login
{
	public function __construct()
	{
	}

	public function register($user,$pass)
	{
		####################################################
		####################################################
		$conn=new mysqli('localhost','root','', 'csc350');
		if ($conn->connect_error) die($conn->connect_error);
		####################################################
		$query="SELECT * from csc350.users";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		####################################################
		$rows=$result->num_rows;
		for($i=0;$i<$rows;++$i)
		{
			$result->data_seek($i);
			$row=$result->fetch_array(MYSQLI_ASSOC);
			if($row['username'] == $user)
			{
				$result->close();
				$conn->close();
				return false;
			}
		}
		####################################################
		$query="insert into csc350.users 
            values( '$user' , '$pass', 0)";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
		####################################################
		//$result->close();
		$conn->close();
		//include("index.php");
		return true;
	}

	public function login($user, $pass)
	{
		####################################################
		$servername = 'localhost';
		$dbusername = 'root';
		$dbpassword = '';
		$dbname = 'csc350';
		####################################################
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		if ($conn->connect_error) die($conn->connect_error);
		####################################################
		$query = "SELECT * from csc350.users";
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		####################################################
		$rows = $result->num_rows;
		for ($i = 0; $i < $rows; ++$i) {
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$userid = $row['username'];
			$password = $row['password'];
			if (($user == $userid) && ($pass == $password)) {
				return true;
				break;
			}
		}
		####################################################
		$result->close();
		$conn->close();
		return false;
	}
}

?>
