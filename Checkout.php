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

	if(isset($_POST['Username']))
	{
	// create connection 
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// create SQL statement to get row number

	$sql = "SELECT * FROM customers"; 
	
	//Execute the SQL statement
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}
          
        //Count the record number
	$counter = $rs->num_rows;
        $newid = $counter+1;
                
$sql = "INSERT INTO order details (CustomerID, Username, Password, ContactName, Emailaddress, Address, City, Country, Phone, Enabled)
VALUES ('$newid', '$_POST[Username]', '$_POST[Password]', '$_POST[ContactName]', '$_POST[Emailaddress]', '$_POST[Address]', '$_POST[City]', '$_POST[Country]', '$_POST[Phone]', '1')";
                    
	
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

?>
</html>
