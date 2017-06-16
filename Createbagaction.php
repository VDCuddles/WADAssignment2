<?php
require("ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Bag Action</title>
</head>

<body>
<?php
if (isset($_FILES["bagimage"]) && ($_FILES["bagimage"]["error"] > 0))
  {
  echo "Error: " . $_FILES["paper_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["bagimage"]))
  {
    move_uploaded_file($_FILES["bagimage"]["tmp_name"], "../WADPHPAssignment/WAImages/bags/" . $_FILES["bagimage"]["name"]); //Save the file as the supplied name
  }
else
  {
	 trigger_error("No file supplied", E_USER_ERROR);
  }
?>

<?php
// create connection
$mysqli = new mysqli("localhost", "halpea01", "12111990", "halpea01mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "INSERT INTO products(UnitPrice,ImageUrl,CategoryID, ProductName)
        VALUES('" . $_POST['bagprice'] . "','" 
		         . $_FILES["bagimage"]["name"] . "','"
                             . $_POST["bagcat"] . "','" 
				 . $_POST['bagname'] . "')"; 
				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
?>
<?php
//Select the file information
$sql="SELECT Products.ProductID As product_ID,
              Products.ProductName As bagprice,
              Products.ImageUrl As bagimage,
              Products.UnitPrice As bagname, 
              Products.CategoryID As cat
      FROM Products";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<TABLE BORDER='1'>
      <TR>
      <TH> Product ID </TH>
      <TH> Bag Price </TH>
      <TH> Bag Image </TH>
      <TH> Bag Name </TH>
      <TH> Bag Category </TH>
      </TR>";
	  
while ($row = $rs->fetch_assoc())
{
  $product_id=$row["product_ID"];
  $bagprice=$row["bagprice"];
  $bagimage=$row["bagimage"];
  $bagname=$row["bagname"];
  $cat=$row["cat"];
  echo "<TR>";
  echo "<TD>$product_id</TD>";
  echo "<TD>$bagprice</TD>";
  echo "<TD>$bagimage</TD>";
  echo "<TD>$bagname</TD>";
  echo "<TD>$cat</TD>";
  echo "</TR>";
}

echo "</TABLE>";
?>

<!--allow users upload their icon file:-->

<!--<form method="post" enctype="multipart/form-data" action="index.php?content_page=ReviewerComments">
<br>
Paper ID:&nbsp;&nbsp;&nbsp;
<input type="text" name="product_ID" size="20"><br> 
Icon File:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="File" name="icon_file" value="" size="30"><br>
<br> 
<input type="Submit" name="submit" value="Submit Icon">
</form>-->

</body>
</html>
