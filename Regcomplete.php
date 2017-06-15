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
                
$sql = "INSERT INTO customers (CustomerID, Username, Password, ContactName, Address, City, Country, Phone, Enabled)
VALUES ('$newid', '$_POST[Username]', '$_POST[Password]', '$_POST[ContactName]', '$_POST[Address]', '$_POST[City]', '$_POST[Country]', '$_POST[Phone]', '1')";
                    
	
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
	// reset SQL statement 
	$sql = "SELECT * FROM customers"; 
	
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
	    <TH> Supplier ID </TH>
	    <TH> Username </TH>
	    <TH> Password </TH>
	    <TH> Contact Name </TH>
	    <TH> Address </TH>
	    <TH> City </TH>
	    <TH> Country </TH>
	    <TH> Phone </TH>
	    <TH> Enabled </TH>
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
            $id=$row["CustomerID"];
            $username=$row["Username"];
            $pass=$row["Password"];
            $conname=$row["ContactName"];
            $addy=$row["Address"];
            $city=$row["City"];
            $country=$row["Country"];
            $phone=$row["Phone"];
            $enabled=$row["Enabled"];
	  echo "<tr><td>$id</td>";
	  echo "<td>$username</td>";
	  echo "<td>$pass</td>";
	  echo "<td>$conname</td>";
	  echo "<td>$addy</td>";
	  echo "<td>$city</td>";
	  echo "<td>$country</td>";
	  echo "<td>$phone</td>";
	  echo "<td>$enabled</td></tr>";
	}
	
	echo "</table>";

	$rs->free();    
	//close connection 
	$mysqli->close(); 
	?>
</body>
</html>