<html>
<head>
	<title>Registration Complete</title>
	<LINK REL=STYLESHEET TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>
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
                
$sql = "INSERT INTO customers (CustomerID, Username, Password, ContactName, Emailaddress, Address, City, Country, Phone, Enabled)
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
	<TABLE border="2">
	  <TR>
	    <TH> Username </TH>
	    <TH> Password </TH>
	    <TH> Contact Name </TH>
	    <TH> Email Address </TH>
	    <TH> Address </TH>
	    <TH> City </TH>
	    <TH> Country </TH>
	    <TH> Phone </TH>
	  </TR>
	  
<?php   

  $username=$_POST[Username];
  $pass=$_POST[Password];
  $conname=$_POST[ContactName];
  $emailaddy=$_POST[Emailaddress];
  $addy=$_POST[Address];
  $city=$_POST[City];
  $country=$_POST[Country];
  $phone=$_POST[Phone];
  echo "<tr>";
  echo "<td>$username</td>";
  echo "<td>$pass</td>";
  echo "<td>$conname</td>";
  echo "<td>$emailaddy</td>";
  echo "<td>$addy</td>";
  echo "<td>$city</td>";
  echo "<td>$country</td>";
  echo "<td>$phone</td>";
	
	echo "</table>";

	$rs->free();    
	//close connection 
	$mysqli->close(); 
	?>
</body>
</html>