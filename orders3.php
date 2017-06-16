<html>

<head>
	<title>Page3Action</title>
	<LINK REL=STYLESHEET TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>
<?php

	if(isset($_POST['OrderID']))
	{
	// create connection 
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// create SQL statement 
	$sql = "UPDATE orders

			SET OrderID='$_POST[OrderID]',
                            CustomerID='$_POST[CustomerID]',
			    ShipName='$_POST[ContactName]',
			    email='$_POST[Emailaddress]',
			    ShipAddress='$_POST[Address]',
			    ShipCity='$_POST[City]',
			    ShipCountry='$_POST[Country]',
			    phone='$_POST[Phone]',
			    Active='$_POST[Active]'
			WHERE OrderID=$_POST[OrderID]"; 
	
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
	// create another SQL statement 
	$sql = "SELECT * FROM orders"; 
	
	//Execute the SQL statement
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}

	//Count the record number
	$counter = $rs->num_rows;
	
	$PageSize=5;
    $PageCount=$counter/$PageSize + 1;
	
	//Output page index table
	echo "<table ID=tableID border=2>";
	echo "<tr>";
	for( $i=1; $i <= $PageCount; $i++)
	{
	echo "<td><a href=index.php?content_page=page3Action&pg=$i> Page $i</a></td>";
	} //end for
	echo "</tr></table><br>";
?>

	<TABLE border="2">
	  <TR>
	    <TH> OrderID </TH>
	    <TH> CustomerID </TH>
	    <TH> Contact Name </TH>
	    <TH> Email Address </TH>
	    <TH> Address </TH>
	    <TH> City </TH>
	    <TH> Country </TH>
	    <TH> Phone </TH>
	    <TH> Active </TH>
	  </TR>
	  
<?php   

   // Test if this is the first page 
	if (isset($_GET['pg']))
	{
	  // set the parameters for the rest pages 
	  $start= ($_GET['pg']-1)*$PageSize + 1;
	  $end= $_GET['pg']*$PageSize;
	  if( $end > $counter )
		$end = $counter;
	}
	else
	{
	  //set the parameters for the first page
	  $start= 1;
	  $end= $PageSize;
	  if( $end > $counter )
		$end = $counter;
	}//end if IsSet("$_GET['pg']")
	
	$j = $start - 1;
	/* seek to row no. $j */
    $rs->data_seek($j);
	
	//Display the page 
	for( $i=$start; $i <= $end; $i++)
	{
	  $row = $rs->fetch_assoc();
          $id=$row["OrderID"];
          $cid=$row["CustomerID"];
          $conname=$row["ShipName"];
          $emailaddy=$row["email"];
          $addy=$row["ShipAddress"];
          $city=$row["ShipCity"];
          $country=$row["ShipCountry"];
          $phone=$row["phone"];
          $active=$row["Active"];
	  echo "<tr><td>$id</td>";
	  echo "<td>$username</td>";
	  echo "<td>$conname</td>";
	  echo "<td>$emailaddy</td>";
	  echo "<td>$addy</td>";
	  echo "<td>$city</td>";
	  echo "<td>$country</td>";
	  echo "<td>$phone</td>";
	  echo "<td>$active</td></tr>";
	}
	
	echo "</table>";

	$rs->free();    
	//close connection 
	$mysqli->close(); 
	?>
</body>
</html>