<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Browse Bags</title>
		<!-- File Heading	
         Name:			page1Action.php
         Purpose:		
         Author:		Xiaosong Li									
         History:		Created on 10/10/2006
                        Modified on 26/5/2010
                        Modified on 19/5/2013
                        Modified on 13/10/2013
                        Modified on 18/5/2014
                        Modified on 12/10/2014
                        Modified on 17/10/2015
                        Modified on 21/5/2017
        -->
        <LINK REL="STYLESHEET" TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>

<?php 

// create connection
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create SQL statement 
$sql = "SELECT * FROM Suppliers WHERE SupplierID < 8"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}
  
?> 

<?php
// Search for an input name 
// create SQL statement 
$sql = "SELECT * FROM Customers 
		WHERE ContactName ='$_GET[StudentName]'"; 

//Execute the SQL statement
if ($result = $mysqli->query($sql)) {
    /* determine number of rows result set */
    $counter = $result->num_rows;
}
else {
	echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
 
?>
<form name="page2Form" METHOD="POST" action="index.php?content_page=page2Action">
<?php 

// create SQL statement 
$sql = "SELECT * FROM Products"; 

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
echo "<td><a href=index.php?content_page=Browse&pg=$i> Page $i</a></td>";
} //end for
echo "</tr></table><br>";
        
//Table head
echo "<table border='2'><tr>";
echo "<th>Index</th>";
echo "<th>Image</th>";
echo "<th>Bag Name</th>";
echo "<th>Supplier ID</th>";
echo "<th>Category ID</th>";
echo "<th>Price</th>";
echo "<th>Stock</th>";
echo "<th>Choice</th></tr>";

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
            $pid=$row["ProductID"];
            $image=$row["ImageUrl"];
            $pname=$row["ProductName"];
            $supid=$row["SupplierID"];
            $catid=$row["CategoryID"];
            $price=$row["UnitPrice"];
            $stock=$row["UnitsInStock"];
            $dir= "WAImages/bags/";
            echo "<tr><td>$pid</td>";
            echo '<td><img src='.$dir.$image.' alt='.$image.' style="width:150px; height:auto;" /></td>';
            echo "<td>$pname</td>";
            echo "<td>$supid</td>";
            echo "<td>$catid</td>";
            echo "<td>$price</td>";
            echo "<td>$stock</td>";
            echo "<td><input type='radio' name='choice' checked='true' value=$id></td></tr>";
	}
	
	echo "</table>";

	$rs->free();    
	//close connection 
	$mysqli->close(); 
?>

<INPUT TYPE="SUBMIT"><br/>
</form>
</body>
</html>
