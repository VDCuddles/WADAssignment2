<?php
require("CheckLogin.php");
?>
<!DOCTYPE>
<html>
<head>
		<title>Checked Out</title>

         <link rel="stylesheet" type="text/css" href="WAStyleSheet/Practical.css"/> 
			

</head>
<body>
    <h2>Thank you for your purchase. </h2>
    <h6>You can review your order in your order history on the right.</h6>
</body>
<?php

	if(isset($_SESSION['current_user']))
	{
	// create connection 
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// create SQL statement to get row number

	$sql = "SELECT * FROM orders"; 
	
	//Execute the SQL statement
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}
          
        //Count the record number
	$counter = $rs->num_rows;
        $newid = $counter+1;
        
        	// create SQL statement to get cust ID

	$sql = "SELECT * FROM Customers
        WHERE Username=".$_SESSION['current_user']; 
	
while ($row = $rs->fetch_assoc())
{
  $id=$row["CustomerID"];
  $username=$row["Username"];
  $pass=$row["Password"];
  $emailaddy=$row["Emailaddress"];
}
                
$sql = "INSERT INTO orders (OrderID, CustomerID, ShipName, ShipAddress, ShipCity, ShipCountry, phone, email, Active)
VALUES ('$newid', '$id', '$_POST[ContactName]' ,'$_POST[Address]', '$_POST[City]', '$_POST[Country]', '$_POST[Phone]', '$emailaddy', '1')";
                    
	
    // execute SQL statement 
	if (!$mysqli->query($sql)) {
		echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	$mysqli->close(); 
	} //end if company
	
	$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//TODO - auto-clear on checkout
//
//$POST_["action"]=clear;
//Business::processActions();

//	if (isset($_SESSION['cart']))
//	{
//	$cart = $_SESSION['cart'];
//	}
//			$items = explode(',',$cart);
//			$newcart = '';
//			$cart = $newcart;                
?>
</html>
